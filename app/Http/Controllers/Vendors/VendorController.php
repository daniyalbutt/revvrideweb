<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\{User, Bookings};
use App\Models\UserCategories;

class VendorController extends Controller
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
    public function reservations()
    {
        $orders = Bookings::whereHas('bookable', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->get();
        return view('vendors.reservation', compact('orders'));
    }
     public function index()
    {
        $data = Tours::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('vendors.tour.index', compact('data'));
    }

    public function profile(){
        $categories = DB::table('categories')->get();

        return view('vendors.profile', compact('categories'));
    }

    public function uploadCertificate(Request $request){
        if($request->hasFile('license')){
            $file = $request->file('license');
            $filename = date('d-m-y-H-i-s').'_'.$file->getClientOriginalName();
            $path = 'public/certificates/';
            $url_path = 'storage/certificates/';
            $file->storeAs($path,$filename);
            $inserted_last = DB::table('certificates')->insertGetId(
                                ['user_id' => Auth::user()->id, 'image' => env('APP_URL').$url_path.$filename]
                            );
            $data = DB::table('certificates')->where('id', $inserted_last)->first();
            return response()->json(['status' => true, 'message' => 'Certificate Updated Successfully', 'data' => $data]);
        }
        return response()->json(['status' => false, 'message' => 'Please Contact to Administrator']);
    }

    public function uploadCertificateDelete(Request $request){
        DB::table('certificates')->where('id', $request->id)->where('user_id', Auth::user()->id)->delete();
        return response()->json(['status' => true, 'message' => 'Certificate Deleted Successfully']);
    }

    public function profileUpdate(Request $request){
        $data = User::find(Auth::user()->id);
        $data->first_name = $request->first_name;
        $data->last_name = $request->last_name;
        $data->gender = $request->gender;
        $data->phone = $request->phone;
        $data->dob = $request->dob;
        if($request->hasFile('display_picture')){
            $file = $request->file('display_picture');
            $filename = date('d-m-y-H-i-s').'_'.$file->getClientOriginalName();
            $path = 'public/users/';
            $url_path = 'storage/users/';
            $file->storeAs($path,$filename);
            $data->display_picture = env('APP_URL').$url_path.$filename;
        }
        $data->save();
        return response()->json(['status' => true]);
    }

    public function businessCategories(Request $request){
        $category_id = $request->id;
        $user_id = Auth::user()->id;
        $data = UserCategories::where('user_id', $user_id)->where('category_id', $category_id)->first();
        if($data == null){
            $insert_cat = new UserCategories();
            $insert_cat->user_id = $user_id;
            $insert_cat->category_id = $category_id;
            $insert_cat->save();
        }else{
            $data->delete();
        }
        return response()->json(['status' => true]);
    }

    public function vendorDashboard(){
        $data =  Bookings::whereHas('bookable', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })
        ->select(
            DB::raw('COUNT(ID) as booking_total'),
            DB::raw('SUM(total) as totalSum'),
            DB::raw('SUM(CASE WHEN datetime > NOW() THEN 1 ELSE 0 END) as upcoming_booking_total')
        )
        ->first();
        return view('vendors.dashboard', compact('data'));
    }
}
