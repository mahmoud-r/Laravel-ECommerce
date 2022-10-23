<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;
    protected $fillable =[
        'order_id',
        'product_id',
        'product_name',
        'quantity',
        'price',
        'sum_price',
    ];

    public function order(){

        return $this->belongsTo(order::class,'order_id');
    }
    public function products(){

        return $this->belongsTo(product::class,'product_id');
    }

}
