<?php

namespace App\Http\Requests;

use App\Models\NewsCategory;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
        $tableNameCategory = (new NewsCategory())->getTable();
        return [
            'title' => ['required', 'min:4', 'max:20'],
            'text' => ['required', 'min:10'],
            'news_category_id' => "required|exists:{$tableNameCategory},id",
            'is_private' =>'boolean',
            'image' => 'mimes:jpeg,png,bmp|max:1000',
        ];
    }

    public function messages() {
        return [
            'required' =>  __('Field :attribute is required '),
            'min' =>  __(':attribute to short'),
            'max' =>  __(':attribute to long '),
            'exists' => __('Not found category :attribute'),
        ];
    }

    public function attributes() {
        return [
            'title' => __('Title'),
            'text' => __('News text'),
            'news_category_id' => __('Category'),
            'is_private' => __('Is private'),
            'image' => __('Image'),
        ];
    }
}
