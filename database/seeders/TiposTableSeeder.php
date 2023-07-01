<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('property_types')->insert([

            // Residencial icon-1
            [
             'type_name' => 'Residencial',
             'type_icon' => 'icon-1',
            ],

            // Comercial
            [
                'type_name' => 'Comercial',
                'type_icon' => 'icon-2',
            ],

            // Apartamento
            [
                'type_name' => 'Apartamento',
                'type_icon' => 'icon-3',
            ],

            // Industrial
            [
                'type_name' => 'Industrial',
                'type_icon' => 'icon-4',
            ],

            // Infonavit
            [
                'type_name' => 'Infonavit',
                'type_icon' => 'icon-5',
            ],

            // Terreno
            [
                'type_name' => 'Terreno',
                'type_icon' => 'icon-6',
            ],

            // Unifamiliar
            [
                'type_name' => 'Unifamiliar',
                'type_icon' => 'icon-7',
            ],

            // Multi familiar
            [
                'type_name' => 'Multi familiar',
                'type_icon' => 'icon-8',
            ],

            // Oficina
            [
                'type_name' => 'Oficina',
                'type_icon' => 'icon-9',
            ],

            // Fabrica
            [
                'type_name' => 'Fabrica',
                'type_icon' => 'icon-10',
            ],


         ]);
    }
}
