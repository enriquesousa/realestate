<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comments')->insert([

            // Comment 1
            [
                'user_id' => 3,
                'post_id' => 3,
                'parent_id' => null,
                'subject' => 'Primer Comentario',
                'message' => 'Su población según el Censo de 2020 es de 3 769 020 habitantes que presenta el 3 % de la población mexicana, siendo la decimocuarta entidad más poblada del país, cercana al puesto medio de puesto diecisiete',
                'aprobado' => false,
                'created_at' => '2023-07-07 07:56:20',
            ],

            // Comment 2
            [
                'user_id' => 3,
                'post_id' => 3,
                'parent_id' => null,
                'subject' => 'Segundo Comentario',
                'message' => 'Este en el mensaje del segundo comentario para Baja California',
                'aprobado' => false,
                'created_at' => '2023-07-07 07:57:20',
            ],

             // Comment 3
             [
                'user_id' => 3,
                'post_id' => 3,
                'parent_id' => null,
                'subject' => 'Tercer Comentario',
                'message' => 'Su Índice de Desarrollo Humano (IDH) es uno de los más altos de México, el cuarto a nivel nacional, calificado como muy alto.​ Además es la duodécima entidad por producto interno bruto (PIB)​ y decimotercera en competitividad según datos del IMCO.',
                'aprobado' => false,
                'created_at' => '2023-07-07 07:58:20',
            ],

         ]);
    }
}
