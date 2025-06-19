<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SlideSeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // — mainSlider (type = 'main') —
            ['img/main-banner.jpg', 'main', 0, 0],
            ['img/bg2.png',         'main', 1, 0],
            ['img/bg3.png',         'main', 2, 0],

            // — productCarousel slide 0 (type = 'product') —
            ['images/banner-1.jpg', 'product', 0, 0],
            ['images/banner-2.jpg', 'product', 0, 1],
            ['images/bg4.png',      'product', 0, 2],

            // — productCarousel slide 1 —
            ['images/bg5.jpg',      'product', 1, 0],
            ['images/banner-2.jpg', 'product', 1, 1],
            ['images/banner-1.jpg', 'product', 1, 2],
        ];

        foreach ($rows as [$path, $type, $idx, $pos]) {
            DB::table('slides')->Insert([
                'image_path'  => $path,
                'type'        => $type,
                'slide_index' => $idx,
                'position'    => $pos,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
