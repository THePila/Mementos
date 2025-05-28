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
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'username' => 'required|string|max:255|unique:users,username',
            'password' => 'required|string|min:8',
            'confirmPassword' => 'required|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'firstName.required' => 'First name is required',
            'firstName.max' => 'First name must not exceed 255 characters',
            'lastName.required' => 'Last name is required',
            'lastName.max' => 'Last name must not exceed 255 characters',
            'email.required' => 'Email is required',
            'email.email' => 'Email must be a valid email address',
            'email.max' => 'Email must not exceed 255 characters',
            'email.unique' => 'Email has already been taken',
            'username.unique' => 'Username has already been taken',
            'username.required' => 'Username is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password must be at least 8 characters',
            'confirmPassword.required' => 'Password confirmation is required',
            'confirmPassword.same' => 'Password confirmation must match password',
        ];
    }
}
