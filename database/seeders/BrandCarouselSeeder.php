<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandCarouselSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // slide_index = 0, position 0..5
            ['images/images/product-thumb-11.jpg','Amber Jar','Honey best nectar you wish to get',0,0],
            ['images/images/product-thumb-12.jpg','Amber Jar','Honey best nectar you wish to get',0,1],
            ['images/images/product-thumb-13.jpg','Amber Jar','Honey best nectar you wish to get',0,2],
            ['images/images/product-thumb-14.jpg','Amber Jar','Honey best nectar you wish to get',0,3],
            ['images/images/product-thumb-11.jpg','Amber Jar','Honey best nectar you wish to get',0,4],
            ['images/images/product-thumb-12.jpg','Amber Jar','Honey best nectar you wish to get',0,5],
        ];

        foreach ($rows as [$path, $subtitle, $title, $idx, $pos]) {
            DB::table('brand_carousels')->insert([
                'image_path'  => $path,
                'subtitle'    => $subtitle,
                'title'       => $title,
                'slide_index' => $idx,
                'position'    => $pos,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
