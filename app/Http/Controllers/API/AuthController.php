<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Korisnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request){

        $validator = Validator::make($request->all(),[
            'ime'=>'required|string|max:255',
            'prezime'=>'required|string|max:255',
            'datumrodjenja'=>'required|date',
            'pol'=>'required|string|max:255',
            'username'=>'required|string|max:255|unique:zaposlenis',
            'password'=>'required|string|min:5',
            'parking_id'=>'required|integer'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

        $korisnik = Korisnik::create([
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

    public function login(){

    }
}