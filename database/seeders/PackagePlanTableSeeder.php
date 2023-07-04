<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PackagePlanTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('package_plans')->insert([

            // para Agent Id 2
            [
                'user_id' => '2',
                'package_name' => 'Busines',
                'invoice' => 'ERS76104096',
                'package_credits' => '3',
                'package_amount' => '20.00',
            ],



         ]);
    }
}
