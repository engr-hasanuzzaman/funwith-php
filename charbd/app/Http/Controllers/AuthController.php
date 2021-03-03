<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $access_token = $user->createToken('admin')->accessToken;
            return response(['access_token' => $access_token]);
        }

        return response(['error' => 'Invalid login credential'], Response::HTTP_UNAUTHORIZED);
    }
}
