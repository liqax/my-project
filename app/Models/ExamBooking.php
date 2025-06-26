<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamBooking extends Model
{
    use HasFactory;

    // Define which fields can be mass-assigned
    protected $fillable = [
        'exam_type',
        'hsk_level',
        'hskk_level',
        'yct_level',
        'exam_date',
        'exam_center',
        'first_name_en',
        'last_name_en',
        'first_name_th',
        'last_name_th',
        'first_name_cn',
        'last_name_cn',
        'pinyin_name',
        'national_id',
        'school_name',
        'email',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'province',
        'postal_code',
        'agree_terms',
    ];

    // If you want to cast the boolean field
    protected $casts = [
        'agree_terms' => 'boolean',
        'exam_date' => 'date',
        'date_of_birth' => 'date',
    ];
}