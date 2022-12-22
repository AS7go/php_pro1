<?php

use Config\Config;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

try {
    $router = new \Core\Router();

    require_once BASE_DIR . '/routes/web.php';
    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])){
        $router->dispatch($_SERVER['REQUEST_URI']);
    }

//    dd(\Core\Db::connect());
} catch (PDOException $exception) {
    d('PDOException', $exception->getMessage());
} catch (Exeption $exception){
    d('Exeption', $exception->getMessage());
}
