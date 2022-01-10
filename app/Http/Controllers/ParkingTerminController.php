<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParkingTerminCollection;
use App\Http\Resources\ParkingTerminResource;
use App\Models\ParkingTermin;
use App\Rules\PostojiAutomobil;
use App\Rules\PostojiParking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'automobil_id' => ['required','integer', new PostojiAutomobil()],
            'parking_id' => ['required','integer', new PostojiParking()],
            'ulazak' => 'required',
            'izlazak' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $parkingTermin = ParkingTermin::create([
            'automobil_id' => $request->automobil_id,
            'parking_id' => $request->parking_id,
            'ulazak' => $request->ulazak,
            'izlazak' => $request->izlazak
        ]);

        return response()->json(['Parking termin uspesno sacuvan.', new ParkingTerminResource($parkingTermin)]);
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
        $validator = Validator::make($request->all(), [
            'automobil_id' => ['required','integer', new PostojiParking()],
            'parking_id' => ['required','integer', new PostojiAutomobil()],
            'ulazak' => 'required',
            'izlazak' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $parkingTermin->automobil_id = $request->automobil_id;
        $parkingTermin->  parking_id = $request->parking_id;
        $parkingTermin->  ulazak = $request->ulazak;
        $parkingTermin->  izlazak = $request->izlazak;
        $parkingTermin->save();

        return response()->json(['Parking termin uspesno azuriran.', new ParkingTerminResource($parkingTermin)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ParkingTermin  $parkingTermin
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParkingTermin $parkingTermin)
    {
        $parkingTermin->delete();
        return response()->json('Parking termin uspesno obrisan.');
    }
}
