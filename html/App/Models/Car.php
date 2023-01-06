<?php

namespace App\Models;

use Core\Model;

class Car extends Model
{
//    static protected string|null $tableName = 'cars';
    protected static string|null $tableName='cars';
//    public function getInfo(): string
//    {
//        // $this?->name == альтернатива old == if $this === null ? null : $this->name
//        return $this?->model . ' - ' . $this?->price;
//    }
}