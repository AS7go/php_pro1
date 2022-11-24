<?php
require __DIR__ . '/vendor/autoload.php';
//     require __DIR__. '/output.php';

try {
    $pdo = new PDO(
        "pgsql:host=db;port=5432;dbname=postgres2",
        'root',
        'secret'
    );
    dd($pdo);
//    var_dump($pdo);
} catch (PDOException $exception) {
    echo '<pre>'.print_r($exception->getMessage(), true).'</pre>';
    die();
}