<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVodicRequest extends FormRequest
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
            'login' => 'required|exists:vodic',
            'meno' => 'required',
            'priezvisko' => 'required',
            'mesto' => 'required',
            'ulica' => 'required',
            'cislo_domu' => 'required',
            'psc' => 'required',
            'password' => 'required|confirmed',
        ];
    }
}
