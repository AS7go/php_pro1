<?php

namespace App\Services;

use App\Models\User;
use App\Validators\Auth\LoginValidator;

class AuthService
{
    public static function call(array $fields, LoginValidator &$validator): bool
    {
        if ($validator->validate($fields) && $user = $validator->checkEmailOnExists($fields['email'])) {
            if ($validator->verifyPassword($fields['password'], $user?->password)) {
                return true;
            }
        }
        return false;
    }
}