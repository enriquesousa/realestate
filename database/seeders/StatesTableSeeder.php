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
             'state_image' => 'upload/state/aguascalientes.jpg',
            ],

            // baja california norte
            [
                'state_name' => 'Baja California',
                'state_image' => 'upload/state/bcn.jpg',
            ],

            // baja california sur
            [
                'state_name' => 'Baja California Sur',
                'state_image' => 'upload/state/bcs.jpg',
            ],

            // campeche
            [
                'state_name' => 'Campeche',
                'state_image' => 'upload/state/campeche.jpg',
            ],

            // chiapas
            [
                'state_name' => 'Chiapas',
                'state_image' => 'upload/state/chiapas.jpg',
            ],

            // chihuahua
            [
                'state_name' => 'Chihuahua',
                'state_image' => 'upload/state/chihuahua.jpg',
            ],

            // coahuila
            [
                'state_name' => 'Coahuila',
                'state_image' => 'upload/state/coahuila.jpg',
            ],

            // colima
            [
                'state_name' => 'Colima',
                'state_image' => 'upload/state/colima.jpg',
            ],

            // durango
            [
                'state_name' => 'Durango',
                'state_image' => 'upload/state/durango.jpg',
            ],

            // guanajuato
            [
                'state_name' => 'Guanajuato',
                'state_image' => 'upload/state/guanajuato.jpg',
            ],

            // Guerrero
            [
                'state_name' => 'Guerrero',
                'state_image' => 'upload/state/guerrero.jpg',
            ],

            // hidalgo
            [
                'state_name' => 'Hidalgo',
                'state_image' => 'upload/state/hidalgo.jpg',
            ],


         ]);
    }
}
