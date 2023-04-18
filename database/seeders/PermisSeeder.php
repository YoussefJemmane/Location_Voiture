<?php

namespace Database\Seeders;

use App\Models\PermisConduire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // an admin is not a driver so he doesn't have a permisConduire_id
        // so we need to seed the permisConduire table to null
        // so we can use the permisConduire_id in the users table
        // to create an admin user

        // create permisConduire with id = 1 and nomPermis = null for admin
        PermisConduire::create([
            'numPermis' => null,
            'dateObtention' => null,
        ]);

    }
}
