<?php

namespace App\Http\Controllers;

use App\Http\Resources\ParkingCollection;
use App\Http\Resources\ParkingResource;
use App\Models\Parking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parking=Parking::all();
        return new ParkingCollection($parking);
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
            'naziv' => 'required|string|max:7',
            'adresa' => 'required|string|max:100',
            'grad' => 'required|string|max:100',
            'brojTelefona' => 'required',
            'email' => 'required',
            'kapacitet' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $parking = Parking::create([
            'naziv' => $request->naziv,
            'adresa' => $request->adresa,
            'grad' => $request->grad,
            'brojTelefona' => $request->brojTelefona,
            'email' => $request->email,
            'kapacitet' => $request->kapacitet
        ]);

        return response()->json(['Parking uspesno sacuvan.', new ParkingResource($parking)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function show(Parking $parking)
    {
        return new ParkingResource($parking);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function edit(Parking $parking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parking $parking)
    {
        $validator = Validator::make($request->all(), [
            'naziv' => 'required|string|max:7',
            'adresa' => 'required|string|max:100',
            'grad' => 'required|string|max:100',
            'brojTelefona' => 'required',
            'email' => 'required',
            'kapacitet' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $parking->naziv = $request->naziv;
           $parking->  adresa = $request->adresa;
           $parking->  grad = $request->grad;
           $parking->  brojTelefona = $request->brojTelefona;
           $parking->  email = $request->email;
           $parking->  kapacitet = $request->kapacitet;
       $parking->save();

        return response()->json(['Parking uspesno azuriran.', new ParkingResource($parking)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Parking  $parking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parking $parking)
    {
        $parking->delete();
        return response()->json('Parking uspesno obrisan.');
    }
}
