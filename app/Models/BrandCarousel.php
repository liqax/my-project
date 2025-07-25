<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandCarousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'image_path',
        'subtitle',
        'title',
        'slide_index',
        'position',
    ];
}
