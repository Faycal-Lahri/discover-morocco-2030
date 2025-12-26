<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::with('destinations')->get();
        $destinations = \App\Models\Destination::with('city')->get();
        return view('cities', compact('cities', 'destinations'));
    }

    public function show(City $city)
    {
        $city->load(['destinations.destinationImages']);
        $otherCities = City::where('id', '!=', $city->id)->inRandomOrder()->take(5)->get();
        $allCities = City::all();

        return view('cities.show', compact('city', 'otherCities', 'allCities'));
    }
}
