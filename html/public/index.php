<?php

use Config\Config;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

$dotenv = \Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

class RouterException extends Exception
{
}

try {
    $router = new \Core\Router();

    require_once BASE_DIR . '/routes/web.php';

    if (!preg_match('/assets/i', $_SERVER['REQUEST_URI'])) {
        $router->dispatch($_SERVER['REQUEST_URI']);
    }
} catch (RouterException $exception) {
    d('RouterException', $exception->getMessage(), $exception->getTrace());
} catch (Exception $exception) {
    d('PDOException', $exception->getMessage());
} catch (PDOException $exception) {
    d('Exeption', $exception->getMessage());
}

// http://127.0.0.1/parks/75/show