<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResourcesRequest extends FormRequest
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
            'name' => 'required|min:4|max:20',
            'url' => 'required|url',
        ];
    }

    public function messages() {
        return [
            'required' =>  __('Field :attribute is required'),
            'min' => __(':attribute to short'),
            'max' => __(':attribute to long '),
            'url' => __(':attribute is not valid url'),
        ];
    }

    public function attributes() {
        return [
            'name' => __('Name'),
            'url' => __('Url'),
        ];
    }
}
