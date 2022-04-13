<?php

namespace App\Http\Requests\profile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
            'name' => ['required', 'string', 'min:3' ],
            'email' => ['required', 'email', 'unique:users,email,'.Auth::id()],
            'password' => ['required','string', ],
            'new-password' => ['required','string', 'min:8']
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
            'name' => 'имя пользователя',
            'password' => 'пароль',
            'new-password' => 'новый пароль',
        ];
    }
}
