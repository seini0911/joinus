<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('service_categories')->insert([
            [
              "name" => "AC",
              "slug" => "ac",
              "image" => "1521969345.png", 
            ],
            [
                "name" => "Beauty",
                "slug" => "Beauty",
                "image" => "1521969358.png", 
            ],
            [
                "name" => "Plumbing",
                "slug" => "plumbing",
                "image" => "1521969409.png", 
            ],
            [
                "name" => "Electrical",
                "slug" => "Electrical",
                "image" => "1521969419.png", 
            ],
            [
                "name" => "Cleaning",
                "slug" => "Cleaning",
                "image" => "1521969446.png", 
            ],
            [
                "name" => "Carpentry",
                "slug" => "Carpentry",
                "image" => "1521969454.png", 
            ],
            [
              "name" => "Pest Control",
              "slug" => "Pest Control",
              "image" => "1521969464.png", 
          ],
        ]);
    }
}
