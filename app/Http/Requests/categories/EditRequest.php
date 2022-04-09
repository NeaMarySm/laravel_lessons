<?php

namespace App\Http\Requests\categories;

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
            
            'title' =>          ['required', 'string', 'min:3', 'max:55'],
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
            'title' => 'наименование',
            'description'  => 'описание'
        ];
    }
}
