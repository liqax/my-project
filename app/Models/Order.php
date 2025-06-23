<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    // ฟิลด์ที่สามารถกรอกข้อมูลได้
    protected $fillable = [
        'user_id',
        'total',
        'shipping_address',
        'payment_method',
        'items',
        'status',
    ];

    // แปลง JSON ให้เป็น array อัตโนมัติ
    protected $casts = [
        'items' => 'array',
    ];

    // ความสัมพันธ์กับ User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
