<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('states')->insert([

            // Aguascalientes
            [
             'state_name' => 'Aguascalientes',
             'state_image' => 'upload/state/aguascalientes.png',
            ],

            // baja_california
            [
                'state_name' => 'Baja California',
                'state_image' => 'upload/state/baja_california.png',
            ],

            // baja_california_sur
            [
                'state_name' => 'Baja California',
                'state_image' => 'upload/state/baja_california_sur.png',
            ],

            // campeche
            [
                'state_name' => 'Campeche',
                'state_image' => 'upload/state/campeche.png',
            ],

            // chiapas
            [
                'state_name' => 'Chiapas',
                'state_image' => 'upload/state/chiapas.png',
            ],

            // chihuahua
            [
                'state_name' => 'Chihuahua',
                'state_image' => 'upload/state/chihuahua.png',
            ],

            // coahuila
            [
                'state_name' => 'Coahuila',
                'state_image' => 'upload/state/coahuila.png',
            ],

            // colima
            [
                'state_name' => 'Colima',
                'state_image' => 'upload/state/colima.jpg',
            ],

            // durango
            [
                'state_name' => 'Durango',
                'state_image' => 'upload/state/durango.png',
            ],

            // guanajuato
            [
                'state_name' => 'Guanajuato',
                'state_image' => 'upload/state/guanajuato.png',
            ],

            // hidalgo
            [
                'state_name' => 'Hidalgo',
                'state_image' => 'upload/state/hidalgo.png',
            ],


         ]);
    }
}
