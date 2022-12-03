<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function postLogin(Request $request){
        $details = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($details)){
            return response()->json([
                'status' => 'success'
            ]);
        }

        return response()->json([
            'status' => 'faild'
        ]);

    }

    public function postRegister(Request $request){

        $details = $request->validate([
            'username' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $user = User::create([
            'username' => $details['username'],
            'firstname' => $details['firstname'],
            'lastname' => $details['lastname'],
            'email' => $details['email'],
            'password' => Hash::make($details['password'])
        ]);

        Auth::login($user);
        return response()->json([
            'status' => 'success'
        ]);
    }
}
