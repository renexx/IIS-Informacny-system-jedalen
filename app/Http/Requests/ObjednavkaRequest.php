<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ObjednavkaRequest extends FormRequest
{
    /*
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name' => 'required',
          'lastname' => 'required',
          'mesto' => 'required',
          'ulica' => 'required',
          'cislo_domu' => 'required',
          'psc' => 'required',
          'poznamka' => 'nullable',
        ];
    }
}
