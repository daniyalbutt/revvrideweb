<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\User;
use App\Models\Rentals;
use App\Models\RentalsAddons;
use App\Models\UserCategories;
use App\Models\Bookings;
use App\Models\BookingAddons;
use Session;
use Stripe;
use DateTime;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function profile(){
        return view('user.profile');
    }

    public function dashboard(){
        return view('user.dashboard');
    }

    public function booking(Request $request){
        $form_availability = $request->form_availability;
        if($form_availability == 0){
            return redirect()->back()->with('error', 'Please Select Date');
        }
        $cartId = $request->product_id;

        $cart = array();

        if (Session::has('cart')) {
			$cart = Session::get('cart');
		}

        if (array_key_exists($cartId, $cart)) {
            unset($cart);
        }

        $productFirstrow = Rentals::where('id', $cartId)->first();
        $cart['id'] = $cartId;
        $cart['name'] = $productFirstrow->title;
        $cart['baseprice'] = $productFirstrow->price;
        $cart['adult_quantity'] = $request->adult_quantity;
        $cart['children_quantity'] = $request->children_quantity;
        $cart['infants_quantity'] = $request->infants_quantity;
        $cart['insurance'] = $request->insurance;
        $cart['datetime'] = $request->datetime;
        $cart['from_time'] = $request->from_time;
        $cart['to_time'] = $request->to_time;
        $cart['total_price'] = $request->form_total_price;
        $cart['form_availability'] = $request->form_availability;
        $quantity = $request->quantity;
        foreach ($quantity as $key => $value) {
            $data = RentalsAddons::where('id', $key)->first();
            $cart['addons'][$key]['id'] = $data->id;
            $cart['addons'][$key]['name'] = $data->name;
            $cart['addons'][$key]['price'] = $data->price;
            $cart['addons'][$key]['quantity'] = $value;
        }

        Session::put('cart', $cart);
        return redirect()->route('user.checkout');
    }

    public function checkout(){
        if (Session::has('cart')) {
			$cart = Session::get('cart');
            return view('user.checkout', compact('cart'));
		}else{
            return redirect()->route('welcome');
        }
    }

    public function order(Request $request){

        $cart = Session::get('cart');
        dd($total_price = (float)$total_price);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $get_stripe_cus = Auth::user()->stripe_cus;
        if(Auth::user()->stripe_cus == null){
            $stripe_cus =  $stripe->customers->create([
                'name' => Auth::user()->first_name . ' ' . Auth::user()->last_name,
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
                'description' => 'Creating From REVV RIDE',
                'source' => $request->stripeToken
            ]);
            $get_stripe_cus = $stripe_cus->id;
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['stripe_cus' => $get_stripe_cus]);
        }

        // $payment_method = $stripe->paymentMethods->create([
        //     'type' => 'card',
        //     'card' => [
        //       'number' => $request->card_number,
        //       'exp_month' => $request->card_exp_month,
        //       'exp_year' => $request->card_exp_year,
        //       'cvc' => $request->card_cvc,
        //     ],
        // ]);

        $a = $request->total_price;
        $total_price = str_replace( ',', '', $a );
        if( is_numeric( $total_price ) ) {
            $a = $total_price;
        }  
        $total_price = (float)$total_price;

        try {
            $charge = \Stripe\Charge::create ([
                "amount" => $total_price * 100,
                "currency" => "usd",
                // "source" => $request->stripeToken,
                "description" => "Rental Booking - " . $cart['name'] ,
                "customer" => $get_stripe_cus
            ]);
            if($charge){
                if($charge->captured){
                    $booking_code = rand(1000000,9999999);
                    $user_id = Auth::user()->id;
                    $datetime = $cart['datetime'];
                    $start_datetime = new DateTime($cart['from_time']); 
                    $diff = $start_datetime->diff(new DateTime($cart['to_time'])); 

                    $duration = $diff->h;
                    $insurance_amount = 0;
                    if($cart['insurance'] != 'NO'){
                        $insurance_amount = 50;
                    }
                    $bookable_type = 'App\Models\Rentals';
                    $bookable_id = $cart['id'];
                    $booking_status = 'Confirmed';
                    $adults = $cart['adult_quantity'];
                    $childs = $cart['children_quantity'];
                    $infants = $cart['infants_quantity'];
                    $rental_availability_id = $cart['form_availability'];
                    $total = $cart['total_price'];

                    $data = new Bookings();
                    $data->booking_code = $booking_code;
                    $data->user_id = $user_id;
                    $date = strtotime($cart['datetime']);
                    $data->datetime = date('Y-m-d', $date) . ' ' . $cart['from_time'];
                    $data->duration = $duration;
                    $data->insurance_amount = $insurance_amount;
                    $data->bookable_type = $bookable_type;
                    $data->bookable_id = $bookable_id;
                    $data->booking_status = $booking_status;
                    $data->adults = $adults;
                    $data->childs = $childs;
                    $data->infants = $infants;
                    $data->rental_availability_id = $rental_availability_id;
                    $data->total = (float)$total;
                    $data->transaction_id = $charge->id;
                    $data->save();

                    foreach($cart['addons'] as $key => $addons){
                        $book_addon = new BookingAddons();
                        $book_addon->booking_id = $data->id;
                        $book_addon->rental_id = $bookable_id;
                        $book_addon->rental_addons_id = $addons['id'];
                        $book_addon->quantity = $addons['quantity'];
                        $book_addon->amount = $addons['price'];
                        $book_addon->total = (float)$addons['price'] * (int)$addons['quantity'];
                        $book_addon->save();
                    }
                    Session::flash('success', 'Payment successful!');
                }
            }
        } catch(\Stripe\Exception\CardException $e) {
            Session::flash('error', "A payment error occurred: {$e->getError()->message}");
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            Session::flash('error', "An invalid request occurred.");
        } catch (Exception $e) {
            Session::flash('error', "Another problem occurred, maybe unrelated to Stripe. " . $e);
        }
        return back();
    }


    public function getBooking(){
        return view('user.booking');
    }
}