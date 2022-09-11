<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=> 'required|max:255|',
            'quantity'=> 'required|numeric|integer|min:0',
            'price'=> 'required|numeric|min:0',
            'status'=> 'nullable|',
            'featured'=> 'nullable|',
            'brand_id'=> 'required|numeric|',
            'Categorie_id'=> 'required|numeric|',
            'sub_Categorie_id'=> 'required|numeric|',
        ];
    }
}
