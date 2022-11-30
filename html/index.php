<?php
require __DIR__ . '/vendor/autoload.php';

try {
$pdo= new PDO(
    "mysql:host=db;dbname=test",
    'root',
    'secret'
);
d($pdo);
//var_dump($pdo);
} catch (PDOException $exception) {
    echo '<pre>'.print_r($exception->getMessage(),true).'</pre>';
    die();
}