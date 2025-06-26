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
        Schema::create('exam_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('exam_type');
            $table->string('hsk_level')->nullable();
            $table->string('hskk_level')->nullable();
            $table->string('yct_level')->nullable();
            $table->date('exam_date');
            $table->string('exam_center');

            $table->string('first_name_en');
            $table->string('last_name_en');
            $table->string('first_name_th');
            $table->string('last_name_th');
            $table->string('first_name_cn');
            $table->string('last_name_cn');
            $table->string('pinyin_name');
            $table->string('national_id', 13)->unique(); // Assuming national ID is unique
            $table->string('school_name')->nullable();
            $table->string('email');
            $table->string('phone', 10);
            $table->string('gender');
            $table->date('date_of_birth');
            $table->text('address');
            $table->string('province');
            $table->string('postal_code', 5);
            $table->boolean('agree_terms'); // To record if terms were accepted

            $table->timestamps(); // created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_bookings');
    }
};