<?php

namespace App\Http\Controllers;

use App\Http\Resources\ZaposleniCollection;
use App\Http\Resources\ZaposleniResource;
use App\Models\Zaposleni;
use App\Rules\PostojiParking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ZaposleniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zaposleni = Zaposleni::all();
        return new ZaposleniCollection($zaposleni);
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
        $validator = Validator::make($request->all(),[
            'ime'=>'required|string|max:255',
            'prezime'=>'required|string|max:255',
            'datumrodjenja'=>'required|date',
            'pol'=>'required|string|max:255',
            'username'=>'required|string|max:255|unique:zaposlenis',
            'password'=>'required|string|min:5',
            'parking_id'=>['required','integer',new PostojiParking()]
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $korisnik = Zaposleni::create([
            'ime'=>$request->ime,
            'prezime'=>$request->prezime,
            'datumrodjenja'=>$request->datumrodjenja,
            'pol'=>$request->pol,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'parking_id'=>$request->parking_id
        ]);

        $token=$korisnik->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$korisnik,'access_token'=>$token,'token_type'=>'Bearer']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Zaposleni  $zaposleni
     * @return \Illuminate\Http\Response
     */
    public function show(Zaposleni $zaposleni)
    {
        return new ZaposleniResource($zaposleni);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Zaposleni  $zaposleni
     * @return \Illuminate\Http\Response
     */
    public function edit(Zaposleni $zaposleni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Zaposleni  $zaposleni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Zaposleni $zaposleni)
    {
        $validator = Validator::make($request->all(), [
            'ime' => 'required|string|max:100',
            'prezime' => 'required|string|max:100',
            'datumrodjenja' => 'required|string|max:100',
            'pol' => 'required|string|max:100',
            'username' => 'required',
            'parking_id' => ['required','integer',new PostojiParking()]
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }


        $zaposleni->ime = $request->ime;
        $zaposleni->  prezime = $request->prezime;
        $zaposleni->  datumrodjenja = $request->datumrodjenja;
        $zaposleni->  username = $request->username;
        $zaposleni->  pol = $request->pol;
        $zaposleni->  parking_id = $request->parking_id;
        $zaposleni->save();

        return response()->json(['Zaposleni uspesno azuriran.', new ZaposleniResource($zaposleni)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Zaposleni  $zaposleni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Zaposleni $zaposleni)
    {
        $zaposleni->delete();
        return response()->json('Zapolseni uspesno obrisan.');
    }
}
