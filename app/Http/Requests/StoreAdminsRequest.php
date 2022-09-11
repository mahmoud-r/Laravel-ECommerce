<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdminsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>'required|',
            'email'=>'required|unique:admins',
            'password'=>'required|',
            'roles' => 'required'
        ];
    }
}
