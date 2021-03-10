<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::all();
        $admin = Role::whereName('Admin')->first();
        foreach($permissions as $permission) {
            DB::table('permission_role')->insert([
                'role_id' => $admin->id,
                'permission_id' => $permission->id,
            ]);
        }

        // TODO: need to change manager to 
        $manager = Role::whereName('Manager')->first();
        $editor = Role::whereName('Editor')->first();
        foreach($permissions as $permission) {
            if (!in_array($permission->name, ['edit_roles'])) {
                DB::table('permission_role')->insert([
                    'role_id' => $manager->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }

         // all the permissions except edit_roles, edit_users
         $editor = Role::whereName('Editor')->first();
         foreach($permissions as $permission) {
             if (!in_array($permission->name, ['edit_roles', 'edit_users'])) {
                 DB::table('permission_role')->insert([
                     'role_id' => $manager->id,
                     'permission_id' => $permission->id,
                 ]);
             }
         }
    }
}
