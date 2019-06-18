<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InsertionPrestaRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            //
            'nom' => 'required|min:2',
            'adresse' => 'required|max:600',
            'telephone'=>'required',
            'profession'=>'required',
            'etablissement'=>'required',
            'salle'=>"required",

        ];
    }
}

