<?php

namespace App\Models;

class Car extends \Core\Model
{
    static protected string|null $tableName = 'cars';

    public function getInfo(): string
    {
        // $this? - '?'принимает null если нет данных. $this?->name === if $this === null ? null : $this->name
        return $this?->model . ' - ' . $this?->price;
    }
}