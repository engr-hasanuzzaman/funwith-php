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
        
        $editor = Role::whereName('Editor')->first();
        foreach($permissions as $permission) {
            if (!in_array($permission->name, ['edit_roles'])) {
                DB::table('permission_role')->insert([
                    'role_id' => $editor->id,
                    'permission_id' => $permission->id,
                ]);
            }
        }

         $reviewerPermissions = ['view_users', 'view_roles', 'view_products', 'view_orders'];
         $reviewer = Role::whereName('Reviewer')->first();
         foreach($permissions as $permission) {
             if (in_array($permission->name, $reviewerPermissions)) {
                 DB::table('permission_role')->insert([
                     'role_id' => $reviewer->id,
                     'permission_id' => $permission->id,
                 ]);
             }
         }
    }
}
