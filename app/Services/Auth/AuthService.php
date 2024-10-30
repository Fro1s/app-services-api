<?php

namespace App\Services\Auth;

use App\Exceptions\ApiException;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthService
{
    
    public function login(array $data): array
    {
        if (!Auth::attempt($data)) {
            throw new ApiException('Credenciais inválidas', 401);
        } 
        return [
            'token' => JWTAuth::fromUser(Auth::user()),
            'user' => Auth::user()
        ];
    }


    public function me(): User
    {
        $user = JWTAuth::user()->load([
            'user',
        ]);
        return $user;
    }
}