<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:255',
                'min:2'
            ],
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:255',
                'unique:users,email'
            ],
            'city' => [
                'required',
                'string',
                'max:255',
                'min:2'
            ],
            'password' => [
                'required',
                'string',
                'min:8',
                'confirmed'
            ],
            'password_confirmation' => [
                'required',
                'string',
                'min:8'
            ],
            'device_name' => [
                'sometimes',
                'string',
                'max:255'
            ],
            'terms_accepted' => [
                'sometimes',
                'boolean',
                'accepted'
            ]
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Имя обязательно для заполнения.',
            'name.min' => 'Имя должно содержать минимум 2 символа.',
            'name.max' => 'Имя не может быть длиннее 255 символов.',
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Email должен быть корректным адресом электронной почты.',
            'email.unique' => 'Пользователь с таким email уже существует.',
            'email.max' => 'Email не может быть длиннее 255 символов.',
            'city.required' => 'Город обязателен для заполнения.',
            'city.min' => 'Название города должно содержать минимум 2 символа.',
            'city.max' => 'Название города не может быть длиннее 255 символов.',
            'password.required' => 'Пароль обязателен для заполнения.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'password.confirmed' => 'Подтверждение пароля не совпадает.',
            'password_confirmation.required' => 'Подтверждение пароля обязательно.',
            'device_name.max' => 'Название устройства не может быть длиннее 255 символов.',
            'terms_accepted.accepted' => 'Необходимо принять условия использования.'
        ];
    }

    /**
     * Get the device name for token creation.
     */
    public function getDeviceName(): string
    {
        return $this->input('device_name', 'web-registration');
    }

    /**
     * Check if terms were accepted.
     */
    public function areTermsAccepted(): bool
    {
        return $this->boolean('terms_accepted', false);
    }
}
