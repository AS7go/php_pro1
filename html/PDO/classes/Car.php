<?php

class car
{
    public $id, $park_id, $model, $year, $price;

    public function getInfo()
    {
        return "{$this->model}({$this->year}) - {$this->price}$";
    }
}