<?php

namespace App\Validators;

use App\Models\Park;
use App\Models\User;
use App\Validators\Base\BaseValidator;

class ParksValidator extends BaseValidator
{
    protected array $rules = [
<<<<<<< HEAD
        'serial_number' => '/[a-zA-Z0-9_]{3,}/',
=======
        'serial_number' => '/^[a-zA-Z0-9_]{3,16}$/',
>>>>>>> 98b696733ebfc89aac0f60610a98d59d2c81200e
        'address' => '/[a-zA-Z0-9_]{3,}/',
    ];

    protected array $errors = [
<<<<<<< HEAD
        'serial_number' => 'Serial number should contain only "a-z A-Z 0-9 _" and length should be more than 3 symbols',
        'address' => 'Address should contain only "a-z A-Z 0-9 _" and length should be more than 3 symbols',
    ];

//    public function checkIfExists(string $serialNumber): bool|Park
//    {
//        return Park::findBy('serial_number', $serialNumber);
//    }
=======
        'serial_number' => 'Serial number should contain only "a-z A-Z 0-9 _" and length should be more than 3 symbols and less than 16',
        'address' => 'Address should contain only "a-z A-Z 0-9 _" and length should be more than 3 symbols',
    ];
>>>>>>> 98b696733ebfc89aac0f60610a98d59d2c81200e
}
