<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id', 'name', 'address_line', 'phone'];
}

// app/Models/Coupon.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Coupon extends Model
{
    protected $fillable = ['code', 'discount_amount', 'expires_at'];

    public function isExpired()
    {
        return Carbon::parse($this->expires_at)->isPast();
    }
} 