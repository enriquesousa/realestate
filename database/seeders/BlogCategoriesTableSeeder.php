<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blog_categories')->insert([

            // Blog Category 1 id=1
            [
                'category_name' => 'Bienes inmuebles',
                'category_slug' => 'bienes-inmuebles',
            ],

            // Blog Category 2
            [
                'category_name' => 'Interiores',
                'category_slug' => 'interiores',
            ],

            // Blog Category 3
            [
                'category_name' => 'Arquitectura',
                'category_slug' => 'arquitectura',
            ],

            // Blog Category 4
            [
                'category_name' => 'Mejora del Hogar',
                'category_slug' => 'mejora-del-hogar',
            ],

             // Blog Category 5 id=5
             [
                'category_name' => 'Estados',
                'category_slug' => 'estados',
            ],

         ]);
    }
}
