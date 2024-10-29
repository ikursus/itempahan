<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendaftaranUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:filter,rfc,spoof', 'unique:users,email'],
            'password' => ['required', 'min:3', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Sila isi nama',
            'email.required' => 'Sila isi email',
            'email.email' => 'Format Email tidak sah',
            'email.unique' => 'Email telah wujud',
            'password.required' => 'Sila isi kata laluan',
            'password.min' => 'Kata laluan terlalu pendek',
            'password.confirmed' => 'Kata laluan tidak sama',
        ];
    }
}
