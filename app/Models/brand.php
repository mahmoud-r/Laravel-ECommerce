<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class brand extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable=[
        'name',
        'image',
    ];



    public function products(){

        return $this->hasMany(product::class);
    }
    public function categories(){

        return $this->belongsToMany(Categorie::class,'products');
    }
    public function sub_categories(){

        return $this->belongsToMany(sub_Categorie::class,'products');
    }
}
