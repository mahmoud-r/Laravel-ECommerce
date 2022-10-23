<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;
    protected $fillable =[
        'product_id',
        'user_id',
        'review',
        'comment',
    ];


    public function product(){
        return $this->belongsTo(product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
