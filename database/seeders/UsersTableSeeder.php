<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([

           // Admin
           [
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'admin',
            'status' => 'active',
            'phone' => '(562) 456-6723',
            'address' => 'SALAMANCA ESQ AV CANAL SN NO. S/N, CIUDAD INDUSTRIAL, 36541',
            'photo' => 'admin.png',
           ],

           // Agent
           [
            'name' => 'Agent',
            'username' => 'agent',
            'email' => 'agent@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'agent',
            'status' => 'active',
            'phone' => '(555) 156-6734',
            'address' => 'CARR. TAMPICO MANTE KM 11.5 SN, NIÑOS HEROES, 89359',
            'photo' => 'agent.jpg',
           ],

           // User
           [
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('111'),
            'role' => 'user',
            'status' => 'active',
            'phone' => '(542) 836-2745',
            'address' => ' AV TEHUACAN SUR NO. 124, LA PAZ, 72160',
            'photo' => 'user.jpg',
           ],

        ]);
    }
}
