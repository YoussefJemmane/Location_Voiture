<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MarqueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('marques')->insert([
            [
                'nomMarque' => 'Dacia',
            ],
            [
                'nomMarque' => 'Fiat',
            ],
            [
                'nomMarque' => 'Ford',
            ],
            [
                'nomMarque' => 'Honda',
            ],
            [
                'nomMarque' => 'Hyundai',
            ],
            [
                'nomMarque' => 'Kia',
            ],
        ]);
    }
}
