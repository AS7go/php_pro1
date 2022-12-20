<?php

class Room
{
    public static $location = "wwwww";

    public static function seyWel1()
    {
        echo 'stati method';
    }
}

echo Room::$location;
$myRoom=new Room();
echo $myRoom::seyWel1();




//class Room
//{
//    private $color='111';
////    public $color='111';
//
//    public function getColor()
//    {
//        echo $this->color;
////        return $this->color;
//    }
//
//    public function setColor(string $color)
//    {
//        $this->color = $color;
//    }
//
//}
//
//$obj=new Room();
////$obj->color='222';
////$obj->getColor();
//$obj->setColor('533355');
//$obj->getColor();

//use Config\Config;
//
//require_once dirname(__DIR__) . '/Config/constants.php';
//require_once BASE_DIR . '/vendor/autoload.php';
//
//$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
//$dotenv->load();
//
//try {
//
//    $pdo = new PDO(
//        'mysql:host=db;dbname=taxi',
//        Config::get('db.user'),
//        Config::get('db.password')
//    );
//
//    d($pdo);
//} catch (PDOException $exception) {
//    d('Exception', $exception->getMessage());
//}
