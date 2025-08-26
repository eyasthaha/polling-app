<?php

namespace App\Services;

use App\Models\User;

class AuthService
{
    
    public function register(array $data)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        return true;
    }

}