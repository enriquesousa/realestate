<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class SmtpSettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('smtp_settings')->insert([

            // Insertar Dummy Data Despues la podemos actualizar con los datos reales de mailtrap.io, los tengo en .env
            [
                'mailer' => 'smtp',
                'host' => 'smtp',
                'port' => 'smtp',
                'username' => 'smtp',
                'password' => 'smtp',
                'encryption' => 'smtp',
                'from_address' => 'smtp',
            ],


         ]);
    }
}
