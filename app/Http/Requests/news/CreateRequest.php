<?php

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' =>          ['required', 'string', 'min:3', 'max:55'],
            'category_id' =>    ['required', 'integer'],
            'status' =>         ['required', 'string', 'min:5', 'max:7'],
            'author' =>         ['required', 'string'],
            'image' =>          ['nullable', 'image', 'mimes:jpg, png, jpeg '],
            'description' =>    ['nullable', 'string']
        ];
    }

    public function messages()
    {
        
    }

    public function attributes()
    {
        
    }
}
