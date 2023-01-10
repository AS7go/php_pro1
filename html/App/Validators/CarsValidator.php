<?php

namespace App\Validators;

use App\Models\Car;
use App\Models\User;
use App\Validators\Base\BaseValidator;

class CarsValidator extends BaseValidator
{
    protected array $rules = [
        'park_id' => '/^[a-zA-Z0-9_]{1,16}$/',
        'model' => '/[a-zA-Z0-9_]{1,}/',
    ];

    protected array $errors = [
        'park_id' => 'Serial number should contain only "a-z A-Z 0-9 _" and length should be more than 1 symbols and less than 16',
        'model' => 'Address should contain only "a-z A-Z 0-9 _" and length should be more than 1 symbols',

    ];
}
