<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewProduct extends Model
{
    use HasFactory;

    protected $table = 'new_products'; // ชื่อตารางใน DB

    protected $fillable = [
        'title',
        'image',
        'price',
        'sale_price',
    ];
}
