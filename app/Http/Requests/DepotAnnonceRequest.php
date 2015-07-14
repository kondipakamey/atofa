<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class DepotAnnonceRequest extends Request
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
            'nom' => 'required|min:5|max:20|alpha_num',
			'email' => 'required|email',
			'tel' => 'required|numeric',
			'titre' => 'required|max:250',
			'prix' => 'required|alpha_num',
			'description' => 'required|max:250',
			'image' => 'required|image',
			
        ];
    }
}
