<?php

namespace App\Requests;

use Crudch\Http\FormRequest;

class LoginRequest extends FormRequest
{
    protected static $messages = [
        'email.required'    => 'Пожалуйста, укажите email адрес',
        'email.email'       => 'Пожалуйста, введите корректный email адрес',
        'password.required' => 'Пожалуйста, введите пароль',
    ];

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }
}
