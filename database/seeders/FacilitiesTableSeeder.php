<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class FacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('facilities')->insert([

            // para Property 1
            [
                'property_id' => '1',
                'facility_name' => 'Banco',
                'distance' => '1',
            ],
            [
                'property_id' => '1',
                'facility_name' => 'Centro Comercial',
                'distance' => '1',
            ],
            [
                'property_id' => '1',
                'facility_name' => 'Aeropuerto',
                'distance' => '2',
            ],

            // para Property 2
            [
                'property_id' => '2',
                'facility_name' => 'Banco',
                'distance' => '1',
            ],
            [
                'property_id' => '2',
                'facility_name' => 'Centro Comercial',
                'distance' => '1',
            ],
            [
                'property_id' => '2',
                'facility_name' => 'Aeropuerto',
                'distance' => '2',
            ],

            // para Property 3
            [
                'property_id' => '3',
                'facility_name' => 'Banco',
                'distance' => '1',
            ],
            [
                'property_id' => '3',
                'facility_name' => 'Centro Comercial',
                'distance' => '1',
            ],
            [
                'property_id' => '3',
                'facility_name' => 'Aeropuerto',
                'distance' => '2',
            ],

            // para Property 4
            [
                'property_id' => '4',
                'facility_name' => 'Banco',
                'distance' => '1',
            ],
            [
                'property_id' => '4',
                'facility_name' => 'Centro Comercial',
                'distance' => '1',
            ],
            [
                'property_id' => '4',
                'facility_name' => 'Aeropuerto',
                'distance' => '2',
            ],


         ]);
    }
}
