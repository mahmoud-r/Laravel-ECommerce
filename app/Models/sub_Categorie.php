<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class sub_Categorie extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];

    protected $fillable =[
        'name',
        'categorie_id'
    ];

    public function categorie(){

        return $this->belongsTo(Categorie::class);
    }


    public function products(){

        return $this->hasMany(product::class,'sub_Categorie_id');
    }
    public function brands(){

        return $this->belongsToMany(brand::class,'products','sub_Categorie_id','brand_id');
    }
}


