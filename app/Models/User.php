<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    // กำหนดฟิลด์ที่สามารถเพิ่มข้อมูลลงได้ (Mass Assignment)
  protected $fillable = [
    'name', 'email', 'password', 'phone', 'gender', 'occupation','is_admin',
];
  public function addresses()
{
    return $this->hasMany(Address::class);
}
public function user()
{
    return $this->belongsTo(User::class);
}

}
