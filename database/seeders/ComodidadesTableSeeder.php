<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;


class ComodidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('amenities')->insert([

            // Aire Acondicionado
            [
             'amenities_name' => 'Aire Acondicionado',
            ],

            // Servicio de Limpieza
            [
                'amenities_name' => 'Servicio de Limpieza',
            ],

            // Lavadora y Secadora
            [
                'amenities_name' => 'SLavadora y Secadora',
            ],

            // Pisos de Madera
            [
                'amenities_name' => 'Pisos de Madera',
            ],

            // Alberca
            [
                'amenities_name' => 'Alberca',
            ],

            // Regadera externa
            [
                'amenities_name' => 'Regadera externa',
            ],

            // Microondas
            [
                'amenities_name' => 'Microondas',
            ],

            // Refrigerador
            [
                'amenities_name' => 'Refrigerador',
            ],

            // Estufa
            [
                'amenities_name' => 'Estufa',
            ],

            // Admite Mascotas
            [
                'amenities_name' => 'Admite Mascotas',
            ],

            // Cancha de Basket Ball
            [
                'amenities_name' => 'Cancha de Basket Ball',
            ],

            // Cancha de Tenis
            [
                'amenities_name' => 'Cancha de Tenis',
            ],

            // Gimnasio
            [
                'amenities_name' => 'Gimnasio',
            ],


         ]);
    }
}
