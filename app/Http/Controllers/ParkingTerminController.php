<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParkingTerminCollection;
use App\Http\Resources\ParkingTerminResource;
use App\Models\ParkingTermin;
use Illuminate\Http\Request;

class ParkingTerminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $termini = ParkingTermin::all();
        return new ParkingTerminCollection($termini);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ParkingTermin  $parkingTermin
     * @return \Illuminate\Http\Response
     */
    public function show(ParkingTermin $parkingTermin)
    {
        return new ParkingTerminResource($parkingTermin);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ParkingTermin  $parkingTermin
     * @return \Illuminate\Http\Response
     */
    public function edit(ParkingTermin $parkingTermin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ParkingTermin  $parkingTermin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ParkingTermin $parkingTermin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParkingTermin  $parkingTermin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParkingTermin $parkingTermin)
    {
        //
    }
}
