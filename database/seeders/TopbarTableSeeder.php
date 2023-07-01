<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TopbarData;
use DB;

class TopbarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('topbar_data')->insert([

            // Admin
            [
             'address' => 'PERIFERICO 11763, MERIDA CENTRO, 97000',
             'horario' => 'Lunes a Viernes 8:00am a 5:00pm',
             'phone' => '(554) 567-7789',
            ],

         ]);
    }
}
