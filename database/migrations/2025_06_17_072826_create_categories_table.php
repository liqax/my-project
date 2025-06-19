<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');            // ชื่อหมวด เช่น หนังสือ
            $table->string('slug');   // ใช้ใน URL
            $table->string('image_path');      // path รูปไอคอน/รูปประกอบ
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
