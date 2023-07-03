<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('properties')->insert([

            // Propiedad 1
            [
                'ptype_id' => '1',
                'amenities_id' => 'Servicio de Limpieza,Pisos de Madera,Microondas,Estufa,Cancha de Basket Ball',
                'property_name' => 'Casa Linda',
                'property_slug' => 'casa-linda',
                'property_code' => 'PC001',
                'property_status' => 'compra',
                'lowest_price' => '1200000',
                'max_price' => '1450000',
                'property_thambnail' => 'upload/property/thambnail/p1t.png',
                'short_descp' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas',
                'long_descp' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Leo vel fringilla est ullamcorper eget nulla facilisi etiam dignissim. Odio pellentesque diam volutpat commodo sed egestas. Ut morbi tincidunt augue interdum velit euismod in pellentesque. Ornare arcu odio ut sem nulla pharetra. Suspendisse interdum consectetur libero id. Sit amet commodo nulla facilisi nullam. Integer vitae justo eget magna fermentum iaculis eu non diam. Nibh ipsum consequat nisl vel pretium lectus. Risus in hendrerit gravida rutrum quisque non tellus orci ac. Dictum varius duis at consectetur lorem donec massa sapien faucibus. Pretium vulputate sapien nec sagittis aliquam malesuada. Tortor condimentum lacinia quis vel eros. Nulla facilisi nullam vehicula ipsum. Facilisis magna etiam tempor orci eu lobortis elementum. Sed vulputate odio ut enim blandit. Auctor urna nunc id cursus metus aliquam eleifend mi. Ut sem viverra aliquet eget sit amet tellus. Elit sed vulputate mi sit amet mauris commodo.</p>',
                'bedrooms' => '4',
                'bathrooms' => '3',
                'garage' => '1',
                'garage_size' => '155',
                'property_size' => '650',
                'property_video' => null,
                'address' => 'CARR TAMPICO-MANTE KM 10.5 S/N, AEROPUERTO INTERNACIONAL, 89339',
                'city' => 'Tijuna',
                'state' => '2',
                'postal_code' => '89339',
                'neighborhood' => 'El centro',
                'latitude' => '32.533482',
                'longitude' => '-117.115273',
                'google_map' => null,
                'featured' => '1',
                'hot' => '1',
                'agent_id' => '4',
                'status' => '1',
                'created_at' => '2023-07-01 12:53:34',
            ],




         ]);
    }
}
