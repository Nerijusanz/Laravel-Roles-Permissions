<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{

    public function authorize()
    {
        true;
    }

    public function rules()
    {
        return [
            'name'     => [
                'required'
            ],
            'email'    => [
                'required',
                'unique:users'
            ],
            'password' => [
                'required'
            ],
            'roles.*'  => [
                'integer'
            ],
            'roles'    => [
                'required',
                'array'
            ],
        ];
    }
}
