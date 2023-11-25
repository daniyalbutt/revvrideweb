<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use App\Models\Rentals;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Redirect;
use DB;
use App\Models\RentalsImages;
use App\Models\RentalsAddons;

class VendorRentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Rentals::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('vendors.rental.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cat = Auth::user()->get_categories;
        return view('vendors.rental.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'price_type' => 'required',
            'locations' => 'required',
            'image.*' => 'required',
            'desc' => 'required',
            'capacity' => 'required',
            'skills' => 'required',
            'cancel_days' => 'required',
            'cancel_percent' => 'required',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $data = new Rentals();
        $data->title = $request->title;
        $data->user_id = Auth::user()->id;
        $data->category_id = $request->category_id;
        $data->price = $request->price;
        $data->price_type = $request->price_type;
        $data->locations = $request->locations;
        $data->desc = $request->desc;
        $data->capacity = $request->capacity;
        $data->skills = $request->skills;
        $data->cancel_days = $request->cancel_days;
        $data->cancel_percent = $request->cancel_percent;
        $data->save();

        foreach ($request->file('image') as $imagefile) {
            $filename = date('d-m-y-H-i-s').'_'.$imagefile->getClientOriginalName();
            $path = 'public/rentals/';
            $url_path = 'storage/rentals/';
            $imagefile->storeAs($path,$filename);
            DB::table('rental_images')->insert(
                ['rental_id' => $data->id, 'image' => env('APP_URL').$url_path.$filename]
            );
        }

        $addon = $request->addon;
        foreach($addon as $key => $value){
            if($value['name'] != null){
                DB::table('rental_addons')->insert(
                    ['rental_id' => $data->id, 'name' => $value['name'], 'price' => $value['price']]
                );
            }
        }

        $availability = $request->availability;
        foreach($availability as $key => $value){
            if($value['day'] != null){
                DB::table('rental_availability')->insert(
                    ['rental_id' => $data->id, 'day' => $value['day'], 'from' => $value['from'], 'to' => $value['to']]
                );
            }
        }

        return redirect()->back()->with('success', 'Rental Created Successfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Rentals $rentals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Rentals::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if($data == null){
            return redirect()->route('vendors.rental.index');
        }
        $cat = Auth::user()->get_categories;
        return view('vendors.rental.edit', compact('data', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'price_type' => 'required',
            'locations' => 'required',
            'desc' => 'required',
            'capacity' => 'required',
            'skills' => 'required',
            'cancel_days' => 'required',
            'cancel_percent' => 'required',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $data = Rentals::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->price_type = $request->price_type;
        $data->locations = $request->locations;
        $data->desc = $request->desc;
        $data->capacity = $request->capacity;
        $data->skills = $request->skills;
        $data->cancel_days = $request->cancel_days;
        $data->cancel_percent = $request->cancel_percent;
        $data->save();


        if($request->hasFile('image')){
            foreach ($request->file('image') as $imagefile) {
                $filename = date('d-m-y-H-i-s').'_'.$imagefile->getClientOriginalName();
                $path = 'public/rentals/';
                $url_path = 'storage/rentals/';
                $imagefile->storeAs($path,$filename);
                DB::table('rental_images')->insert(
                    ['rental_id' => $data->id, 'image' => env('APP_URL').$url_path.$filename]
                );
            }
        }

        $addon = $request->addon;
        foreach($addon as $key => $value){
            if($value['name'] != null){
                DB::table('rental_addons')->insert(
                    ['rental_id' => $data->id, 'name' => $value['name'], 'price' => $value['price']]
                );
            }
        }

        $availability = $request->availability;
        foreach($availability as $key => $value){
            if($value['day'] != null){
                DB::table('rental_availability')->insert(
                    ['rental_id' => $data->id, 'day' => $value['day'], 'from' => $value['from'], 'to' => $value['to']]
                );
            }
        }

        return redirect()->back()->with('success', 'Rental Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentals $rentals)
    {
        //
    }

    public function vendorFilesDelete(Request $request){
        $id = $request->id;
        $table = $request->table;
        if($table == 0){
            RentalsImages::find($id)->delete();
        }else if($table == 1){
            RentalsAddons::find($id)->delete();
        }
        return response()->json(['status' => true, 'message' => 'Image Deleted Successfully']);
    }
}
