<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCategoryRequest extends FormRequest
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
            'title' => ['required', 'min:4', 'max:10'],
            'slug' => ['required', 'min:1', 'max:10'],
        ];
    }

    public function messages() {
        return [
            'required' => __('Field :attribute is required'),
            'min' => __(':attribute to short'),
            'max' => __(':attribute to long'),
        ];
    }

    public function attributes() {
        return [
            'title' => __('Title'),
            'slug' => __('Slug'),
        ];
    }
}
