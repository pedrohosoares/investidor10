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
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() : array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'description'=>'',
            'slug'=>'',
            'description'=>'',
            'thumbnail'=>'',
            'author_id'=>'',
            'published' => 'required'
        ];
    }

    public function messages() : array
    {
        return [
            'title.required' => 'Escreva um título',
            'title.string' => 'Escreva uma frase',
            'content.required' => 'Escreva um conteúdo',
            'content.string' => 'Escreva um texto',
            'published.required' => 'Escreva uma data',
        ];
    }
}
