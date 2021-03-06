<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $roleSeeder = new RoleSeeder();
        $roleSeeder->run();
        \App\Models\User::factory(10)->create();
        (new ProductSeeder())->run();
    }
}
