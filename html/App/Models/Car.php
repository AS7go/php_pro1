<?php

namespace App\Models;

class Car extends \Core\Model
{
    static protected string|null $tableName = 'cars';

    public function getInfo(): string
    {
        // $this?->name == альтернатива old == if $this === null ? null : $this->name
        return $this?->model . ' - ' . $this?->price;
    }
}