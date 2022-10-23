<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=> 'required|max:255|',
            'name_ar'=> 'required|max:255|',
            'quantity'=> 'required|numeric|integer|min:0',
            'price'=> 'required|numeric|min:0',
            'old_price'=> 'nullable|numeric|min:0',
            'status'=> 'nullable|',
            'featured'=> 'nullable|',
            'brand_id'=> 'required|numeric|',
            'Categorie_id'=> 'required|numeric|',
            'sub_Categorie_id'=> 'required|numeric|',
        ];
    }


}
