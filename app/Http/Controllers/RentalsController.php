<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Rentals;
use Illuminate\Http\Request;
use DB;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $rentals = Rentals::get();
        $data['rentals'] = $rentals;
        $data['categories'] = Categories::get();

        $start = \Carbon\Carbon::parse($rentals->min('start_date'));
        $end = \Carbon\Carbon::parse($rentals->max('end_date'));
        $data['duration'] = $start->diff($end);
        $data['active_id'] = 0;
        return view('sports.index')->with($data);
    }

    public function inner($slug, $id)
    {
        $inners = Rentals::where('id', $id)->get();
        return view('sports.inner')->with(['inners' => $inners[0]]);
    }

    public function sportByCategory($slug, $id){
        $rentals = Rentals::get();
        $data['rentals'] = $rentals;
        $data['categories'] = Categories::get();

        $start = \Carbon\Carbon::parse($rentals->min('start_date'));
        $end = \Carbon\Carbon::parse($rentals->max('end_date'));
        $data['duration'] = $start->diff($end);
        $data['active_id'] = $id;
        return view('sports.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Rentals $rentals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rentals $rentals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentals $rentals)
    {
        //
    }

    public function checkAvailability(Request $request){
        $rental_id = $request->id;
        $day = $request->day;
        $from = $request->from;
        $to = $request->to;
        $data = DB::table('rental_availability')->where('rental_id', $rental_id)->whereIn('day', $day)->get();
        $found = null;
        $availability = 0;
        foreach($data as $key => $value){
            if((int)$from >= (int)$value->from){
                if((int)$value->to >= (int)$to){
                    $availability = 1;
                    $found = $value;
                }
            }
        }
        return response()->json(['status' => true, 'availability' => $availability, 'found' => $found]);
    }
}
