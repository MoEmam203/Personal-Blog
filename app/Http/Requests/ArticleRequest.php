<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
        return[
            'title' => 'required|min:3|max:255',
            'full_text' => 'required|min:10',
            'image' => 'image|nullable',
            'category_id' => "required|exists:categories,id",
            'tag' => "required|exists:tags,id"
        ];
    }

    public function messages()
    {
        return [
            'category_id.exists' => "Category not valid",
            'tag.exists' => "Tag not valid",
            'tag.required' => "Choose at least one tag"
        ];
    }
}

