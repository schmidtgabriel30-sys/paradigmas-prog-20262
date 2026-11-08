<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginService
{
    public function login(array $data)
    {
        $user = User::query()->where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            abort(401, 'Email ou senha inválidos.');
        }

        return [
            'token_type' => 'Bearer',
            'token' => $user->createToken('auth_token')->plainTextToken
        ];
    }
}
