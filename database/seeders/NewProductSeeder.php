<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NewProduct; // ✅ ต้องมีบรรทัดนี้

class NewProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewProduct::create([
            'title' => 'สยามรวมมิตร',
            'image' => 'img/slick/หนังสืออ่านเพิ่ม.jpg',
            'price' => 190.00,
            'sale_price' => 120.50,
        ]);

        NewProduct::create([
            'title' => 'หนังสือปฐมวัย',
            'image' => 'img/slick/ปฐมวัย.jpg',
            'price' => 190.00,
            'sale_price' => 120.50,
        ]);

        NewProduct::create([
            'title' => 'หนังสือคู่มือครู',
            'image' => 'img/slick/คู่มือครู.jpg',
            'price' => 290.00,
            'sale_price' => 220.50,
        ]);

        NewProduct::create([
            'title' => 'คณิตศาสตร์ประถมต้น',
            'image' => 'img/slick/หนังสือคณิต.jpg',
            'price' => 180.00,
            'sale_price' => 135.00,
        ]);

        NewProduct::create([
            'title' => 'วิทยาศาสตร์ประถม',
            'image' => 'img/slick/หนังสือวิทย์.jpg',
            'price' => 200.00,
            'sale_price' => 160.00,
        ]);

        NewProduct::create([
            'title' => 'หนังสือเด็ก',
            'image' => 'img/slick/หนังสือเด็ก.jpg',
            'price' => 175.00,
            'sale_price' => 140.00,
        ]);
    }
}
