<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->nullable()->constrained()->onDelete('set null'); // หากสินค้าถูกลบก็ยังเก็บข้อมูลใน order
            $table->string('product_title')->nullable(); // เก็บชื่อสินค้า ณ เวลาที่สั่ง
            $table->decimal('price', 10, 2); // ราคาต่อหน่วย ณ เวลาที่สั่ง
            $table->integer('quantity');
            $table->string('size')->nullable(); // ขนาด (ถ้ามี)
            $table->decimal('total', 10, 2); // ราคารวมของสินค้ารายการนี้
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};