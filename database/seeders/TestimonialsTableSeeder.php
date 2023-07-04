<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class TestimonialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert([

            // Testimonial 1
            [
                'name' => 'Federico Balcazar',
                'position' => 'Gerente',
                'message' => 'Our goal each day is to ensure that our residents’ needs are not only met but   exceeded. To make that happen we are committed to providing an environment in which  residents can enjoy.',
                'image' => 'upload/testimonials/pt1.jpg',
            ],

            // Testimonial 2
            [
                'name' => 'Andreo Arcos',
                'position' => 'Cardiólogo',
                'message' => 'Our goal each day is to ensure that our residents’ needs are not only met but   exceeded. To make that happen we are committed to providing an environment in which  residents can enjoy.',
                'image' => 'upload/testimonials/pt2.jpg',
            ],

            // Testimonial 3
            [
                'name' => 'Bertha Minjares',
                'position' => 'Agente de Ventas',
                'message' => 'Our goal each day is to ensure that our residents’ needs are not only met but   exceeded. To make that happen we are committed to providing an environment in which  residents can enjoy.',
                'image' => 'upload/testimonials/pt3.jpg',
            ],

         ]);
    }
}
