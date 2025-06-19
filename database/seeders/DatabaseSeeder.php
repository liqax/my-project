<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\SlideSeeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\NewProductSeeder;
use Database\Seeders\CategorySeeder;
use Database\Seeders\BrandCarouselSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
              SlideSeeder::class,
              CategorySeeder::class,
              BrandCarouselSeeder::class,
              NewProductSeeder::class,
              ProductSeeder::class,
              NewProductSeeder::class,
    ]);
       
    }
}
