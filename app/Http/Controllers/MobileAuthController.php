<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class MobileAuthController extends Controller
{
    //Register a user from mobile app
    public function register(Request $request)
    {
        $attributes = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
            'phone'=>'required|string',
            'utype'=>'required',
            'password'=>'required|min:6|confirmed',
        ]);

        //create user's account
        $user = User::create([
            'name'=>$attributes['name'],
            'email'=>$attributes['email'],
            'phone'=>$attributes['phone'],
            'utype'=>$attributes['utype'],
            'password'=>bcrypt($attributes['password']),
        ]);

        //return user and token in response
        return response([
            'user'=>$user,
            'token'=>$user->createToken('secret')->plainTextToken
        ],200);
    }

      //login a user from mobile app
    public function login(Request $request)
    {
        //validate fields
        $attributes = $request->validate([
        'email'=>'required|email',
        'password'=>'required|min:6',
        ]);

        //attempt login
        if(!Auth::attempt($attributes)){
            return response([
                'message'=>'Information invalide',
            ],403);
        }
        //return user and token in response
        return response([
            'user'=>auth()->user(),
            'token'=>auth()->user()->createToken('secret')->plainTextToken

        ],200);
    }

    //logout user
    public function logout()
    {
      auth()->user()->tokens()->delete();
      return response([
          'message'=>'Vous êtes déconnecté',
      ],200); 
    }

    //get user details
    public function user()
    {
        return response([
            'user'=>auth()->user(),
        ],200);
    }
}
