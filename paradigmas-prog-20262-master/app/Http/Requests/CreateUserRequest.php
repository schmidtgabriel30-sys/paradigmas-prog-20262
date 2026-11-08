<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:100', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:4', 'max:20']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O campo nome é obrigatório.',
            'name.string' => 'O campo nome precisa ser um texto.',
            'name.max' => 'O campo nome deve ter no máximo :max caracteres.',
            'name.min' => 'O campo nome deve ter no mínimo :min caracteres.',
            'email.required' => 'O campo email é obrigatório.',
            'email.email' => 'O campo email deverá ser um email válido.',
            'email.unique' => 'Já existe um usuário cadastrado com esse email.',
            'password.required' => 'O campo senha é obrigatório.',
            'password.string' => 'O campo senha deve ser um texto.',
            'password.min' => 'O campo senha deve conter no mínimo :min caracteres',
            'password.max' => 'O campo senha deve conter no máximo :max caracteres',
        ];       
    }
}
