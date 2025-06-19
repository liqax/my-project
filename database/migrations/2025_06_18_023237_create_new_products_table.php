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
         Schema::create('new_products', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('image'); // รูปภาพสินค้า
        $table->decimal('price', 8, 2);
        $table->decimal('sale_price', 8, 2)->nullable(); // ราคาหลังลด
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('new_products');
    }
};
