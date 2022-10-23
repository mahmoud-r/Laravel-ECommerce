<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable =[
        'user_id',
        'addresses_id',
        'order_number',
        'status',
        'shipping_method',
        'payment_method',
        'subtotal',
        'tax',
        'total',
        'shipping',
        'note',
        'status_id',
        'date'
    ];

    public function items(){

        return $this->hasMany(order_item::class,'order_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function address(){
        return $this->belongsTo(Addresses::class,'addresses_id');
    }
    public function products(){

        return $this->belongsToMany(product::class,'order_items');
    }
    public function status(){

        return $this->belongsToMany(Status::class,'status_orders','order_id','status_id')->withPivot('note', 'date','user');
    }

}
