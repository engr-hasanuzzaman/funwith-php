<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

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

    public function register(RegisterRequest $request) {
        $user = User::create(
            $request->only('name', 'email', 'role_id') + 
            ['password' => Hash::make($request->input('password'))]
        );

        return response($user, Response::HTTP_CREATED);

    }
}
