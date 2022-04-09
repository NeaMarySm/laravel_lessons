<?php

namespace App\Http\Requests\sources;

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
            'name' =>    ['required', 'string', 'min:3', 'max:55'],
            'url'  =>    ['required', 'url' ],
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
            'name' => 'источник',
            'url'  => 'url адрес'
        ];
    }
}
