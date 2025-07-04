<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('user_id');
    $table->decimal('total', 10, 2);
    $table->text('shipping_address');
    $table->string('payment_method');
    $table->text('items'); // เก็บ cart
    $table->string('status')->default('รอดำเนินการ');
    $table->timestamps();
});
    }
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
