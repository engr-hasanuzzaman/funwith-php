<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        \Gate::authorize('view', 'users');
       return UserResource::collection(User::paginate());
    }

    public function profile()
    {
        $user = \Auth::user();
        // NOTE: use resource with the below does not add permisson
        // additional does not work with
        return (new UserResource($user))->additional([
            'data' => [
                'permissions' => $user->permissions->pluck('name'),
            ]
        ]);
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->update($request->only('name', 'role_id'));
        return response(new UserResource($user), Response::HTTP_OK);
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        if ($request->input('password') !== $request->input('confirm_password')) {
            return response(['error_message' => 'Password and confirm password is not same'], 422);
        }

        $user->update(['password' => Hash::make($request->input('password'))]);
        return response(new UserResource($user), Response::HTTP_ACCEPTED);
    }

    public function show(int $id)
    {
        $user = User::with('role')->find($id);
        return response(new UserResource($user), Response::HTTP_OK);
    }
}
