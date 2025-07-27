<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => [
                'required',
                'string',
                'email:rfc,dns',
                'max:255'
            ],
            'password' => [
                'required',
                'string',
                'min:8'
            ],
            'device_name' => [
                'sometimes',
                'string',
                'max:255'
            ],
            'remember' => [
                'sometimes',
                'boolean'
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
            'email.required' => 'Email обязателен для заполнения.',
            'email.email' => 'Email должен быть корректным адресом электронной почты.',
            'email.max' => 'Email не может быть длиннее 255 символов.',
            'password.required' => 'Пароль обязателен для заполнения.',
            'password.min' => 'Пароль должен содержать минимум 8 символов.',
            'device_name.max' => 'Название устройства не может быть длиннее 255 символов.',
            'remember.boolean' => 'Поле "запомнить меня" должно быть true или false.'
        ];
    }

    /**
     * Get the device name for token creation.
     */
    public function getDeviceName(): string
    {
        return $this->input('device_name', 'web-browser');
    }

    /**
     * Check if remember me is enabled.
     */
    public function shouldRemember(): bool
    {
        return $this->boolean('remember', false);
    }
}
