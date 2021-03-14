<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/users",
     *      operationId="getUsersList",
     *      tags={"users"},
     *      summary="Get list of user",
     *      description="Returns list of users",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *      @OA\Parameter(
     *          name="page",
     *          in="query",
     *          description="Pagination Page",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *  )
     * Returns list of users
     */
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

    public function store(RegisterRequest $request) {
        \Gate::authorize('edit', 'users');
        $user = User::create(
            $request->only('name', 'email', 'role_id') + 
            ['password' => Hash::make('password')]
        );

        return response($user, Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *      path="/api/users/{id}",
     *      operationId="getUser",
     *      tags={"users"},
     *      summary="Get user information",
     *      description="Returns user information",
     *      @OA\Response(
     *          response=200,
     *          description="successful operation",
     *          @OA\JsonContent()
     *       ),
     *       @OA\Response(response=400, description="Bad request"),
     *       security={
     *           {"bearerAuth": {}}
     *       },
     *      @OA\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          description="User ID",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *  )
     * Returns list of users
     */
    public function show(int $id)
    {
        \Gate::authorize('view', 'users');
        $user = User::with('role')->find($id);
        return response(new UserResource($user), Response::HTTP_OK);
    }
}
