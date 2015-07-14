<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserCreateRequest extends Request
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
            'name' => 'required|max:255|unique:users',
			'email' => 'required|email|max:255|unique:users',
			'phone' => 'required|max:15',
			'address' => 'required|max:250',
			'postalCode' => 'required|max:8',
			'shopName' => 'required|max:255',
			'shopDescription' => 'required',
			'shopPicture' => 'required|image'
        ];
    }
}
