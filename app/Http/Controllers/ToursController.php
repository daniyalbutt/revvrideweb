<?php

namespace App\Http\Controllers;

use App\Models\Tours;
use App\Models\ToursImages;
use Illuminate\Http\Request;

class ToursController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tours = Tours::get();
        $data['tours'] = $tours;
        $data['tourrecommendeds'] = $tours->where('recommended', '1')->take(2);

        $start = \Carbon\Carbon::parse($tours->min('start_date'));
        $end = \Carbon\Carbon::parse($tours->max('end_date'));
        $data['duration'] = $start->diff($end);

        return view('tours.index')->with($data);
    }

    public function inner($slug, $id)
    {
        $inners = Tours::where('id', $id)->get();
        return view('tours.inner')->with(['inners' => $inners[0]]);
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
    public function show(Tours $tours)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tours $tours)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tours $tours)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tours $tours)
    {
        //
    }
}
