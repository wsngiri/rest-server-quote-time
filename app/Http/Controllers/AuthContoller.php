<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthContoller extends Controller
{
    public function register(Request $request)
    {
      $this->validate($request,[
          'username' =>'required|unique:users',
          'email' =>'required|unique:users',
          'password' =>'required',
      ]);
    }

    User::Create(
        [
            'username'  => $request->json('username'),
            'email'     => $request->json('email'),
            'password'  =>$request->json('password'),
        ]
    )
}