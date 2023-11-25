<?php

namespace App\Http\Controllers\Vendors;

use App\Http\Controllers\Controller;
use App\Models\Tours;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Validator;
use Redirect;
use DB;
use App\Models\ToursImages;
use App\Models\RentalsAddons;

class VendorToursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tours::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->get();
        return view('vendors.tour.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vendors.tour.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'locations' => 'required',
            'image.*' => 'required',
            'desc' => 'required',
            'capacity' => 'required',
            'age' => 'required',
            'whats_include' => 'required',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $data = new Tours();
        $data->user_id = Auth::user()->id;
        $data->locations = $request->locations;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->desc = $request->desc;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->age = $request->age;
        $data->capacity = $request->capacity;
        $data->whats_include = $request->whats_include;
        $data->save();

        foreach ($request->file('image') as $imagefile) {
            $filename = date('d-m-y-H-i-s').'_'.$imagefile->getClientOriginalName();
            $path = 'public/tours/';
            $url_path = 'storage/tours/';
            $imagefile->storeAs($path,$filename);
            DB::table('tours_images')->insert(
                ['tour_id' => $data->id, 'image' => env('APP_URL').$url_path.$filename]
            );
        }

        return redirect()->back()->with('success', 'Tour Created Successfully');

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
        $data = Tours::where('id', $id)->where('user_id', Auth::user()->id)->first();
        if($data == null){
            return redirect()->route('vendors.tour.index');
        }
        $cat = Auth::user()->get_categories;
        return view('vendors.tour.edit', compact('data', 'cat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'price' => 'required',
            'locations' => 'required',
            'image.*' => 'required',
            'desc' => 'required',
            'capacity' => 'required',
            'age' => 'required',
            'whats_include' => 'required',
        ]);

        if($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $data = Tours::find($id);
        $data->locations = $request->locations;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->desc = $request->desc;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->age = $request->age;
        $data->capacity = $request->capacity;
        $data->whats_include = $request->whats_include;
        $data->save();


        if($request->hasFile('image')){
            foreach ($request->file('image') as $imagefile) {
                $filename = date('d-m-y-H-i-s').'_'.$imagefile->getClientOriginalName();
                $path = 'public/tours/';
                $url_path = 'storage/tours/';
                $imagefile->storeAs($path,$filename);
                DB::table('tours_images')->insert(
                    ['tour_id' => $data->id, 'image' => env('APP_URL').$url_path.$filename]
                );
            }
        }

        return redirect()->back()->with('success', 'Tour Updated Successfully');

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
        }else if($table == 2){
            ToursImages::find($id)->delete();
        }
        return response()->json(['status' => true, 'message' => 'Image Deleted Successfully']);
    }
}
