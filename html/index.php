<?php
require __DIR__ . '/vendor/autoload.php';

interface BirdEat
{
    public function eat();
}

interface BirdFly
{
    public function fly();
}

class Swallow implements BirdEat, BirdFly
{
    public function eat() {
        echo "Swallow-eat <br />";
    }
    public function fly() {
        echo "Swallow-fly <br />";
    }
}

//class Ostrich implements BirdEat, BirdFly
class Ostrich implements BirdEat
{
    public function eat() {
        echo "Ostrich-eat <br />";
    }
    public function fly() {
//        echo "Ostrich-fly <br />";
        throw new Exception('NO BirdFly -> Ostrich-fly !!!');
    }
}


$obj =new Ostrich();
$obj->eat();
$obj->fly();


// =====================================================================
//ДЗ 11. Interface segregation
//Відрефакторити приклад по принципу Interface segregation:

//interface Bird
//{
//    public function eat();
//    public function fly();
//}
//
//class Swallow implements Bird
//{
//    public function eat() { }
//    public function fly() { }
//}
//
//class Ostrich implements Bird
//{
//    public function eat() { }
//    public function fly() { /* exception */ }
//}
// =====================================================================
