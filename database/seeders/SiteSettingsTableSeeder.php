<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SiteSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('site_settings')->insert([

            // Admin
            [
                'support_phone' => '(664) 555-6756',
                'company_address' => 'PERIFERICO 11763, MERIDA CENTRO, 97000',
                'horario' => 'Lunes a Viernes 8:00am a 5:00pm',
                'email' => 'easyreal@gmail.com',
                'facebook' => 'https://www.facebook.com/',
                'twitter' => 'https://www.twitter.com/',
                'copyright' => 'EasyRealshed © 2023 Todos los Derechos Reservados',
                'logo' => 'upload/logo/1771254020009268.png',
            ],

         ]);
    }
}
