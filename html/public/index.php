<?php

use Config\Config;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

try {

//    $pdo = new PDO(
//        'mysql:host=db;dbname=taxi',
//        Config::get('db.user'),
//        Config::get('db.password')
//    );

//    d($pdo);
    d(\Core\Db::connect());
} catch (PDOException $exception) {
    d('Exception', $exception->getMessage());
}
