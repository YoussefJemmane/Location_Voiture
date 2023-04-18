<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create 2 admin users admin is role =1
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'roles' => 1,
            // the admin is not a driver so he doesn't have a permisConduire_id
            'permisConduire_id' => 1,
            'phone' => '0606060606',
        ]);
    }
}
