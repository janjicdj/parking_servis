<?php

namespace App\Http\Controllers;

use App\Http\Resources\KorisnikCollection;
use App\Http\Resources\KorisnikResource;
use App\Models\Korisnik;
use Illuminate\Http\Request;

class KorisnikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $korisnici = Korisnik::all();
        return new KorisnikCollection($korisnici);
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
     * @param  \App\Models\Korisnik  $korisnik
     * @return \Illuminate\Http\Response
     */
    public function show(Korisnik $korisnik)
    {
        return new KorisnikResource($korisnik);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Korisnik  $korisnik
     * @return \Illuminate\Http\Response
     */
    public function edit(Korisnik $korisnik)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Korisnik  $korisnik
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Korisnik $korisnik)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Korisnik  $korisnik
     * @return \Illuminate\Http\Response
     */
    public function destroy(Korisnik $korisnik)
    {
        //
    }
}
