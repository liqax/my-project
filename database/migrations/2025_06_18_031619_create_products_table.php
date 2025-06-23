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
        Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('image'); // เช่น img/books/book1.jpg
        $table->decimal('price', 8, 2);
        $table->string('category'); // books, kits, chemecals, drone
        $table->string('variety');  // booksci, calcu, kid, gen1, gen2, etc.
        $table->boolean('is_best_seller')->default(false);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
