<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required',
            'name' => 'required',
            'lastname' => 'required',
            'ulica' => 'required',
            'cislo_domu' => 'required',
            'psc' => 'required',
            'mesto' => 'required',
            'password' => 'required|confirmed',

        ];
    }
}
