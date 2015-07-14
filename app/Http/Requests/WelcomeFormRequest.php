<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class WelcomeFormRequest extends Request
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
            'item' => 'required|min:2|max:200|alpha',
			'city' => 'required|min:2|max:200|alpha'
        ];
    }
}
