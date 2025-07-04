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
        Schema::table('exam_bookings', function (Blueprint $table) {
            // ตรวจสอบก่อนว่ามีคอลัมน์ 'total_amount' หรือไม่
            if (!Schema::hasColumn('exam_bookings', 'total_amount')) {
                $table->decimal('total_amount', 8, 2)->default(0.00);
            }

            // ตรวจสอบก่อนว่ามีคอลัมน์ 'payment_method' หรือไม่
            if (!Schema::hasColumn('exam_bookings', 'payment_method')) {
                $table->string('payment_method')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_bookings', function (Blueprint $table) {
            // ตรวจสอบก่อนว่ามีคอลัมน์หรือไม่ ก่อนที่จะลบ
            if (Schema::hasColumn('exam_bookings', 'payment_method')) {
                $table->dropColumn('payment_method');
            }
            if (Schema::hasColumn('exam_bookings', 'total_amount')) {
                $table->dropColumn('total_amount');
            }
        });
    }
};