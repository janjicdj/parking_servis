<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutomobilCollection;
use App\Http\Resources\AutomobilResource;
use App\Models\Automobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutomobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $automobili=Automobil::all();
       return new AutomobilCollection($automobili);
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
            'reg_br' => 'required|string|max:7',
            'marka' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'godiste' => 'required|string|max:100',
            'karoserija' => 'required|string|max:100',
            'boja' => 'required|string|max:100',
            'gorivo' => 'required|string|max:100'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $automobil = Automobil::create([
            'reg_br' => $request->reg_br,
            'marka' => $request->marka,
            'model' => $request->model,
            'godiste' => $request->godiste,
            'karoserija' => $request->karoserija,
            'boja' => $request->boja,
            'gorivo' => $request->gorivo
        ]);

        return response()->json(['Automobil uspesno sacuvan.', new AutomobilResource($automobil)]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Automobil  $automobili
     * @return \Illuminate\Http\Response
     */
    public function show(Automobil $automobili)
    {
        return new AutomobilResource($automobili);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Automobil  $automobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Automobil $automobil)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Automobil  $automobili
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Automobil $automobili)
    {
        $validator = Validator::make($request->all(), [
            'reg_br' => 'required|string|max:7',
            'marka' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'godiste' => 'required|string|max:100',
            'karoserija' => 'required|string|max:100',
            'boja' => 'required|string|max:100',
            'gorivo' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $automobili->reg_br = $request->reg_br;
        $automobili->marka = $request->marka;
        $automobili->model = $request->model;
        $automobili->godiste = $request->godiste;
        $automobili->karoserija = $request->karoserija;
        $automobili->boja = $request->boja;
        $automobili->gorivo = $request->gorivo;

         $automobili->save();

        return response()->json(['Automobil uspesno izmenjen.', new AutomobilResource($automobili)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Automobil  $automobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Automobil $automobili)
    {
        $automobili->delete();
        return response()->json('Automobil uspesno obrisan.');
    }
}
