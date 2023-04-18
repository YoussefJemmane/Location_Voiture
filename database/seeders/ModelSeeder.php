<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('models')->insert([
            // four cars fir each marque {Dacia:marque_id=1,Fiat:marque_id=2,Ford:marque_id=3,Honda:marque_id=4,Hyundai:marque_id=5,Kia:marque_id=6}
            [
                'nomModele' => 'Duster',
                'marque_id' => 1,
            ],
            [
                'nomModele' => 'Logan',
                'marque_id' => 1,
            ],
            [
                'nomModele' => 'Sandero',
                'marque_id' => 1,
            ],
            [
                'nomModele' => 'Punto',
                'marque_id' => 2,
            ],
            [
                'nomModele' => 'Tipo',
                'marque_id' => 2,
            ],
            [
                'nomModele' => '500',
                'marque_id' => 2,
            ],
            [
                'nomModele' => 'Fiesta',
                'marque_id' => 3,
            ],
            [
                'nomModele' => 'Focus',
                'marque_id' => 3,
            ],
            [
                'nomModele' => 'Mondeo',
                'marque_id' => 3,
            ],
            [
                'nomModele' => 'Civic',
                'marque_id' => 4,
            ],
            [
                'nomModele' => 'CR-V',
                'marque_id' => 4,
            ],
            [
                'nomModele' => 'Jazz',
                'marque_id' => 4,
            ],
            [
                'nomModele' => 'i10',
                'marque_id' => 5,
            ],
            [
                'nomModele' => 'i20',
                'marque_id' => 5,
            ],
            [
                'nomModele' => 'i30',
                'marque_id' => 5,
            ],
            [
                'nomModele' => 'Rio',
                'marque_id' => 6,
            ],
            [
                'nomModele' => 'Picanto',
                'marque_id' => 6,
            ],
            [
                'nomModele' => 'Ceed',
                'marque_id' => 6,
            ],
        ]);
    }
}
