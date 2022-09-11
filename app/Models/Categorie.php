<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'image',
    ];

    public function sub_Categories(){

        return $this->hasMany(sub_Categorie::class);
}


    public function products(){

        return $this->hasMany(product::class);
    }
}
