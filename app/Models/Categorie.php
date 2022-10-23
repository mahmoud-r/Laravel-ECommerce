<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;


class Categorie extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = ['name','description'];

    protected $fillable =[
        'name',
        'description',
        'in_home',
    ];




    public function sub_Categories(){

        return $this->hasMany(sub_Categorie::class,'categorie_id');
    }
    public function products(){

        return $this->hasMany(product::class);
    }
    public function brands(){

        return $this->belongsToMany(brand::class,'products');
    }
}
