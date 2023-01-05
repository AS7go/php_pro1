<?php

namespace App\Services;

use App\Models\Car;
use App\Validators\CarsValidator;
use App\Validators\ParksValidator;

class CarsService
{
    public static function create(array $fields, CarsValidator $validator): bool
    {
        if (!$validator->validate($fields) || Car::findBy('park_id', $fields['park_id'])) {
            return false;
        }

        return (bool)Car::create($fields);
    }

    public static function update(int $id, array $fields, CarsValidator $validator): bool
    {
        $result = true;
        $car = Car::find($id);
//        dd($validator->validate($fields), $validator);
        if (!$validator->validate($fields)) {
            $result = false;
        }

        if ($fields['park_id'] !== $car->park_id && Car::findBy('park_id', $fields['park_id'])){
            $validator->setError('park_id', 'Duplicated serial number');
            $result = false;
        }

        return $result ? $car->update($fields) : $result;
    }
}