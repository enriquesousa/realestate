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

            // Admin (1)
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'),
                'role' => 'admin',
                'status' => 'active',
                'phone' => '(562) 456-6723',
                'address' => 'SALAMANCA ESQ AV CANAL SN NO. S/N, CIUDAD INDUSTRIAL, 36541',
                'photo' => 'admin.jpg',
                'credit' => '1',
            ],

            // Agent (2)
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
                'credit' => '1',
            ],

            // User (3)
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
                'credit' => '0',
            ],

            // Agent - Shaniya Conroy - Agent (4)
            [
                'name' => 'Shaniya Conroy',
                'username' => 'conroy',
                'email' => 'medhurst.elvis@example.com',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'status' => 'active',
                'phone' => '(341) 537-3097',
                'address' => '20183 Gibson Fork Suite 809Beierfurt, AZ 99581-6291',
                'photo' => 'agent4.jpg',
                'credit' => '1',
            ],

            // Julia Sandoval - Agent (5)
            [
                'name' => 'Julia Sandoval',
                'username' => 'julia',
                'email' => 'luis94@guardado.org',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'status' => 'active',
                'phone' => '(660) 81-1313',
                'address' => 'Carrer Gallardo, 08, 2º E',
                'photo' => 'agent5.jpg',
                'credit' => '1',
            ],

            // Anna R Stone - Agent (6)
            [
                'name' => 'Anna R Stone',
                'username' => 'anna',
                'email' => 'kenton1973@yahoo.com',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'status' => 'active',
                'phone' => '(951) 903-7916',
                'address' => 'HERIBERTO FRIAS NO. 1404, CENTRO, 82000',
                'photo' => 'agent6.jpg',
                'credit' => '1',
            ],

            // Robert M Edwards - Agent (7)
            [
                'name' => 'Robert M Edwards',
                'username' => 'robert',
                'email' => 'robert123@yahoo.com',
                'password' => Hash::make('111'),
                'role' => 'agent',
                'status' => 'active',
                'phone' => '(931) 603-7916',
                'address' => '439 Arron Smith Drive',
                'photo' => 'agent7.jpg',
                'credit' => '1',
            ],

            // Miranda S Bauer - User (8)
            [
                'name' => 'Miranda S Bauer',
                'username' => 'miranda',
                'email' => 'miranda@yahoo.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
                'phone' => '(345) 123-5616',
                'address' => '6 DE ABRIL PTE NO. 408, CIUDAD OBREGON CENTRO, 85000',
                'photo' => 'user8.jpg',
                'credit' => '0',
            ],

            // Tracy J Martin - User (9)
            [
                'name' => 'Tracy J Martin',
                'username' => 'tracy',
                'email' => 'tracy@yahoo.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
                'phone' => '(676) 765-4616',
                'address' => 'PORFIRIO DIAZ 321, REFORMA, 68050',
                'photo' => 'user9.jpg',
                'credit' => '0',
            ],

            // Alex T Schmidt - User (10)
            [
                'name' => 'Alex T Schmidt',
                'username' => 'alex',
                'email' => 'alex23@yahoo.com',
                'password' => Hash::make('111'),
                'role' => 'user',
                'status' => 'active',
                'phone' => '(936) 378-9918',
                'address' => 'RUFINO TAMAYO 26, ACAPATZINGO, 62440',
                'photo' => 'user10.jpg',
                'credit' => '0',
            ],


        ]);
    }
}
