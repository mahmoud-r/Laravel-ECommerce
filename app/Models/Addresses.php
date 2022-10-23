<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $fillable = [
      'user_id',
      'first_name',
      'last_name',
      'City',
      'address',
      'phone',
      'other_phone',
    ];



    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }
}
