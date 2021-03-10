<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::whereName('Admin')->first();
        $manager = Role::whereName('Manager')->first();
        $editor = Role::whereName('Editor')->first();
    }
}
