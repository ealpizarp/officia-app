<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();

         \App\Models\Listing::factory(5)->create();

        //  Listing::create([
        //      'title' => 'Modern apartment for rent',
        //      'tags' => 'modern, apartment, santaana',
        //      'seller' => 'Eric Alpizar',
        //      'location' => 'SantaAna, San Jose',
        //      'email' => 'ericalpizar@gmail.com',
        //      'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
        //      Beatae aspernatur hic ut magni distinctio expedita, qui at? Consequuntur, reiciendis dolores.'
        //  ]);

        //  Listing::create([
        //     'title' => 'House for rent in Liberia',
        //     'tags' => 'warm, airport, liberia',
        //     'seller' => 'Eric Alpizar',
        //     'location' => 'Liberia, Guanacaste',
        //     'email' => 'ericalpizar@gmail.com',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
        //     Beatae aspernatur hic ut magni distinctio expedita, qui at? Consequuntur, reiciendis dolores.'
        // ]);



    }
}
