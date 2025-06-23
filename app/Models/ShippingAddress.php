<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
     'user_id',
        'first_name', 'last_name', 'company',
        'phone', 'zipcode', 'address',
        'sub_district', 'district', 'province', 'country',
];

}
