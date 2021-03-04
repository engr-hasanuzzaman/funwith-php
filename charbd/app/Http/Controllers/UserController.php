<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    public function index(Request $request)
    {
       return User::all();
    }

    public function profile()
    {
        return response(Auth::user());
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only('name'));
        return response($user, Response::HTTP_OK);
    }
}
