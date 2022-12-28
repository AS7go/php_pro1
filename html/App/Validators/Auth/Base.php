<?php

namespace App\Validators\Auth;

use App\Models\User;
use App\Validators\Base\BaseValidator;

class Base extends BaseValidator
{
    public function checkEmailOnExists(string $email): bool
    {
        return (bool)User::findBy('email', $email);
    }
}
