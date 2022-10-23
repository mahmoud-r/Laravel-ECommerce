<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class product extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'name',
        'description',
        'short_description',
    ];
    protected $fillable =[
        'name',
        'description',
        'quantity',
        'price',
        'old_price',
        'status',
        'featured',
        'best_seller',
        'brand_id',
        'Categorie_id',
        'sub_Categorie_id',
        'short_description',
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

    public function wishlist(){

        return $this->hasMany(wishlist::class);
    }

    public function reviews(){

        return $this->hasMany(review::class);
    }

}
