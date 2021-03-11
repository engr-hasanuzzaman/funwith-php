<?php

namespace App\Http\Controllers;

use App\Http\Resources\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response as HttpFoundationResponse;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  RoleResource::collection(Role::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $role = Role::create($request->only('name'));
        if($permissionIds = $request->input('permissions')) {
            foreach($permissionIds as $permissionId) {
                DB::table('permission_role')->insert([
                    'permission_id' => $permissionId,
                    'role_id' => $role->id,
                ]);
            }
        }
        DB::commit();
        return response(new RoleResource($role), HttpFoundationResponse::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(new RoleResource(Role::find($id)));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        $role = Role::find($id);
        $role->update($request->only('name'));
        if($permissionIds = $request->input('permissions')) {
            // remove old permissions
            DB::table('permission_role')->where('role_id', $role->id)->delete();
            foreach($permissionIds as $permissionId) {
                DB::table('permission_role')->insert([
                    'permission_id' => $permissionId,
                    'role_id' => $role->id,
                ]);
            }
        }
        DB::commit();
        return response(new RoleResource($role), HttpFoundationResponse::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        // delete permissions also
        DB::table('permission_role')->where('role_id', $id)->delete();
        Role::destroy($id);
        DB::commit();
        return response(null, HttpFoundationResponse::HTTP_NO_CONTENT);
    }
}
