<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class MultiImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('multi_images')->insert([

            // 4 Multi Image para Property 1
            [
             'property_id' => '1',
             'photo_name' => 'upload/property/multi-image/m1p1.png',
            ],

            [
                'property_id' => '1',
                'photo_name' => 'upload/property/multi-image/m2p1.png',
            ],

            [
                'property_id' => '1',
                'photo_name' => 'upload/property/multi-image/m3p1.png',
            ],

            [
                'property_id' => '1',
                'photo_name' => 'upload/property/multi-image/m4p1.png',
            ],

            // 4 Multi Image para Property 2
            [
                'property_id' => '2',
                'photo_name' => 'upload/property/multi-image/m1p2.png',
            ],

            [
                'property_id' => '2',
                'photo_name' => 'upload/property/multi-image/m2p2.png',
            ],

            [
                'property_id' => '2',
                'photo_name' => 'upload/property/multi-image/m3p2.png',
            ],

            [
                'property_id' => '2',
                'photo_name' => 'upload/property/multi-image/m4p2.png',
            ],

            // 4 Multi Image para Property 3
            [
                'property_id' => '3',
                'photo_name' => 'upload/property/multi-image/m1p3.png',
            ],

            [
                'property_id' => '3',
                'photo_name' => 'upload/property/multi-image/m2p3.png',
            ],

            [
                'property_id' => '3',
                'photo_name' => 'upload/property/multi-image/m3p3.png',
            ],

            [
                'property_id' => '3',
                'photo_name' => 'upload/property/multi-image/m4p3.png',
            ],

            // 4 Multi Image para Property 4
            [
                'property_id' => '4',
                'photo_name' => 'upload/property/multi-image/m1p4.png',
            ],

            [
                'property_id' => '4',
                'photo_name' => 'upload/property/multi-image/m2p4.png',
            ],

            [
                'property_id' => '4',
                'photo_name' => 'upload/property/multi-image/m3p4.png',
            ],

            [
                'property_id' => '4',
                'photo_name' => 'upload/property/multi-image/m4p4.png',
            ],


         ]);
    }
}
