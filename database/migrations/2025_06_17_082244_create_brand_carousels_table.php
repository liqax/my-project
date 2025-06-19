<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('brand_carousels', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');              // path รูปสินค้า
            $table->string('subtitle')->nullable();    // คำอธิบายสั้น (Amber Jar)
            $table->string('title');                   // ชื่อสินค้า/หัวข้อ
            $table->tinyInteger('slide_index')->default(0); // ถ้าแบ่งเป็นหลายสไลด์
            $table->tinyInteger('position')->default(0);    // ลำดับภายในสไลด์
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('brand_carousels');
    }
};
