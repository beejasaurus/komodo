<?php

namespace App\Http\Controllers;

use App\Aqi;
use Illuminate\Http\Request;

class AqiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $stateTerritory = $request->get('state_territory');
        $county = $request->get('county');
        $year = $request->get('year');
        // Unhealth > X

        return Aqi::when($stateTerritory, function ($query) use ($stateTerritory) {
            return $query->where('state_territory', $stateTerritory);
        })->when($county, function ($query) use ($county) {
            return $query->where('county', $county);
        })->when($year, function ($query) use ($year) {
            return $query->where('year', $year);
        })->get();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Aqi $aqi
     * @return \Illuminate\Http\Response
     */
    public function show(Aqi $aqi)
    {
        return $aqi;
    }
}