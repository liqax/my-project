<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            ['name'=>'หนังสือ',          'slug'=>'books',     'image'=>'img/magazine.png'],
            ['name'=>'อุปกรณ์วิทยาศาสตร์','slug'=>'science',   'image'=>'img/flask.png'],
            ['name'=>'สารเคมี',         'slug'=>'chemicals', 'image'=>'img/cell.png'],
            ['name'=>'โดรน',            'slug'=>'drones',    'image'=>'img/drone.png'],
            ['name'=>'สินค้าอื่นๆ',      'slug'=>'others',    'image'=>'img/refresh.png'],
            ['name'=>'สินค้าอื่นๆ',      'slug'=>'otherss',    'image'=>'img/refresh.png'],
            ['name'=>'สินค้าอื่นๆ',      'slug'=>'othersss',    'image'=>'img/refresh.png'],
        ];
        

        foreach ($cats as $c) {
        DB::table('categories')->updateOrInsert(
            ['slug' => $c['slug']], // ใช้ slug เป็นเงื่อนไขกันซ้ำ
            [
                'name' => $c['name'],
                'image_path' => $c['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
        }
    }
}
