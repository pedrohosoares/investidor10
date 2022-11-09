<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class PostStoreRequest extends FormRequest
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
            'title' => 'required|string|max:140',
            'content' => 'required|string|min:50',
            'category' => 'required',
            'published' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Escreva um título',
            'content.required' => 'Escreva um conteúdo',
            'published.required' => 'Escreva uma data'
        ];
    }
}
