<?php

namespace App\Controllers;

use App\Models\Car;
use Core\Controller;

class ParksController extends Controller
{
    public function show(int $id)
    {
//        d($id);
//        d(Car::select()->get());
//        d(Car::select(['model', 'price'])->get()[0]->getInfo());
//        Car::create([
//            'park_id' => 1,
//            'model' => 'Suzuki',
//            'year' => 2019,
//            'price' => 20.50
//        ]);
//        d(Car::all()->get());
//        d(Car::all());
//        d(Car::select(['model', 'price'])->where('price', '>', 15));
        d(Car::select(['model', 'price'])->where('price', '>', 15)->get());
//        $car = new Car();
//        d($car->where('price', '>', 15));
    }
}