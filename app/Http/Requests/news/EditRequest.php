<?php

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'title' =>          ['required', 'string', 'min:3', 'max:128'],
            'category_id' =>    ['required', 'integer'],
            'status' =>         ['required', 'string', 'min:5', 'max:7'],
            'author' =>         ['required', 'string'],
            'image' =>          ['nullable'],
            'description' =>    ['nullable', 'string']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute нужно заполнить'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'заголовок'
        ];
    }
}
