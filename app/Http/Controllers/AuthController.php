<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\User;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:users',
            'email'    => 'required|unique:users',
            'password' => 'required',
        ]);

        return User::create([
            'username' => $request->post('username'),
            'email'    => $request->post('email'),
            'password' => bcrypt($request->post('password')),
        ]);
    }


}