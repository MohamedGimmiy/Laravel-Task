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

        $user = User::where('username', $details['username'])->firstOrFail();

        if(!Hash::check($request->password, $user->password)){
            return response()->json([
                'status' => 'faild'
            ]);
        }
        if($user){
            Auth::loginUsingId($user->id);
            return response()->json([
                'status' => 'success',
                'user_id' => Auth::id()
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
            'status' => 'success',
            'user_id' => auth()->user()->id
        ]);
    }
}
