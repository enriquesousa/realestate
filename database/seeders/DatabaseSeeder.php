<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UsersTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TopbarTableSeeder::class);
        $this->call(StatesTableSeeder::class);
        $this->call(TiposTableSeeder::class);
        $this->call(ComodidadesTableSeeder::class);

        $this->call(UsersTableSeeder::class);

        $this->call(PropertiesTableSeeder::class);
        $this->call(MultiImageTableSeeder::class);
        $this->call(FacilitiesTableSeeder::class);
        $this->call(PackagePlanTableSeeder::class);
        $this->call(TestimonialsTableSeeder::class);


        // \App\Models\User::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
