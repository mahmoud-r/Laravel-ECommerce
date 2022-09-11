<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'quantity',
        'price',
        'status',
        'featured',
        'brand_id',
        'Categorie_id',
        'sub_Categorie_id',
    ];


    public function brand(){

        return $this->belongsTo(brand::class);
    }

    public function Categorie(){

        return $this->belongsTo(Categorie::class,'Categorie_id');
    }

     public function sub_Categorie(){

        return $this->belongsTo(sub_Categorie::class,'sub_Categorie_id');
    }

    public function images(){

        return $this->hasMany(product_image::class);
    }


}
