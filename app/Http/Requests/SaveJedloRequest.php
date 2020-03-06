<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveJedloRequest extends FormRequest
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
            'typ' => 'required',
            'popis' => 'required',
            'cena' => 'required',
            'dostupnost' => 'required',
            'hmotnost' => 'required',
            'kategoria' => 'required',
            'id_stala_ponuka' => 'required',
            'obrazok' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }
}
