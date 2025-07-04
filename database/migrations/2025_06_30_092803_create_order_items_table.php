<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');

            // การตั้งค่านี้ถูกต้องแล้ว ทำให้เก็บประวัติการสั่งซื้อไว้ได้แม้สินค้าจะถูกลบไป
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null');

            // การเก็บข้อมูลสินค้า ณ เวลาที่สั่งเป็นสิ่งที่ควรทำ
            $table->string('product_title'); // สินค้าในออเดอร์ควรมีชื่อเสมอ
            $table->string('size')->nullable();
            $table->decimal('price', 10, 2);
            $table->unsignedInteger('quantity'); // จำนวนสินค้าไม่ควรติดลบ

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
