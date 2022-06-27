<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\ServiceCategorySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /*
        $this->call([
            ServiceCategorySeeder::class
        ]);
        
        */
        \App\Models\Service::factory(20)->create();
    }
}
