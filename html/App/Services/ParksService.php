<?php

namespace App\Services;

use App\Models\Park;
use App\Validators\ParksValidator;

class ParksService
{
    public static function create(array $fields, ParksValidator $validator): bool
    {
        if (!$validator->validate($fields) || Park::findBy('serial_number', $fields['serial_number'])) {
            return false;
        }

        return (bool)Park::create($fields);
    }

    public static function update()
    {

    }
}