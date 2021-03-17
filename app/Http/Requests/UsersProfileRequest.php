<?php

namespace App\Http\Requests;

use App\Rules\CheckCurrentPassword;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UsersProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => ['required', new CheckCurrentPassword ],
            'newPassword' => 'required|string|min:3'
        ];
    }

    public function messages() {
        return [
            'required' => __('Field :attribute is required!'),
            'min' => __(':attribute to short!'),
            'max' =>  __(':attribute to long!'),
            'unique' => __(':attribute already in use!'),
            'email' => __(':attribute is not valid!'),
        ];
    }

    public function attributes() {
        return [
            'name' => 'required|string|max:15',
            'email' => 'required|email|unique:users,email,' . Auth::id(),
            'password' => 'required',
            'newPassword' => 'required|string|min:3'
        ];
    }
}
