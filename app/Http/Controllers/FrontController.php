<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Rentals;
use App\Models\Tours;
use Illuminate\Http\Request;

class FrontController extends Controller
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
    public function index()
    {
        $data['categories'] = Categories::get();
        $data['rentals'] = Rentals::with('Category')->get();
        $tours = Tours::all();
        $data['tours'] = $tours;
        $data['tourrecommendeds'] = $tours->where('recommended', '1')->take(2);
        $start = \Carbon\Carbon::parse($tours->min('start_date'));
        $end = \Carbon\Carbon::parse($tours->max('end_date'));
        $data['duration'] = $start->diff($end);
        $data['images'] = [
            'atvs' => 'assets/images/c1.png',
            'jetski' => 'assets/images/c2.png',
            'dirt-bike-motorcycles' => 'assets/images/c3.png',
            'snow-mobile' => 'assets/images/c4.png',
            'utvs' => 'assets/images/c5.png',
            'boats' => 'assets/images/c6.png',
            'surf-boards' => 'assets/images/c7.png',
            'snow-borads-skis' => 'assets/images/c8.png',
            'rv' => 'assets/images/c9.png',
            'kayaks-canoes' => 'assets/images/c10.png',
        ];
        // dd($data['images']);
        return view('welcome')->with($data);
    }
}
