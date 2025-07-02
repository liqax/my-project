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
            $table->decimal('total_amount', 8, 2)->default(0.00)->after('agree_terms');
            $table->string('payment_method')->nullable()->after('total_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_bookings', function (Blueprint $table) {
            $table->dropColumn('payment_method');
            $table->dropColumn('total_amount');
        });
    }
};