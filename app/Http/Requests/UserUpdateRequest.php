<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserUpdateRequest extends Request
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
        $id = $this->segment(2);
		return [
			'name' => 'required|max:255|unique:users,name,' . $id,
			'email' => 'required|email|max:255|unique:users,email,' . $id,
			'phone' => 'required|max:15',
			'address' => 'required|max:255',
			'postalCode' => 'required|max:8',
			'shopName' => 'required|max:255',
			'shopDescription' => 'required',
			'shopPicture' => 'required|image',
		];
    }
}
