<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            // 'role' => 'required|in:admin,user',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name required',
            'email.required' => 'Email required',
            'email.email' => 'A valid email address must be entered.',
            'email.unique' => 'This email is already in use.',
            'password.required' => 'Password required.',
        ];
    }
}
