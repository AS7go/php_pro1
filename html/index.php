<?php
require __DIR__ . '/vendor/autoload.php';

$user = "root";
$password = "secret";
$database = "autoparc";
$table = "parks";
$table_cars = "cars";

try {
    $db1 = new PDO("mysql:host=db;dbname=$database", $user, $password);
    echo "<h2>$table</h2>";
    foreach ($db1->query("SELECT * FROM $table") as $row) {
        echo $row['id'] .' '. $row['serial_number'] . ' ' . $row['address'] . "<br/>";
    }
    echo "<h2>$table_cars</h2>";
    foreach ($db1->query("SELECT * FROM $table_cars") as $row) {
        echo $row['id'] .' '. $row['park_id'] . ' ' . $row['model'] . ' ' . $row['year'] .  ' ' . $row['price'] . "<br/>";
    }
} catch (PDOException $e) {
    d($e::class, $e->getFile(), $e->getLine(), $e->getMessage());
    die();
}
