<?php
/**
 * Created by PhpStorm.
 * User: pvstelles
 * Date: 21/07/19
 * Time: 19:49
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;

class LoginController
{
    public function login(Request $request)
    {
        $credentials = $request->only('email','password');
        if(\Auth::attempt($credentials)){
            $user = auth()->user();
            return ['status' => true, 'token' => $user->createToken('email')->accessToken, 'me' => 'PV'];
        }

        return ['status' => false];
    }

    public function me()
    {
        return auth()->user();
    }
}