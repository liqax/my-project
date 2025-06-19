<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');                     // path ของรูป
            $table->enum('type', ['main','product']);         // main-slider หรือ product-carousel
            $table->tinyInteger('slide_index')->default(0);   // กลุ่มย่อย: slide 0, slide 1, …
            $table->tinyInteger('position')->default(0);      // ลำดับภายในกลุ่ม
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('slides');
    }
};
