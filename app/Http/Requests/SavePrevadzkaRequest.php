<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SavePrevadzkaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
  /*  public function authorize()
    {

    }*/

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nazov' => 'required',
            'mesto' => 'required',
            'ulica' => 'required',
            'cislo_domu' => 'required',
            'psc' => 'required',
            'uzv_objednavok' => 'required',
            'obrazok' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
