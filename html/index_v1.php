<?php
require __DIR__ . '/vendor/autoload.php';


$user = "root";
$password = "secret";
$database = "autoparc";
$table = "parks";
$table_cars = "cars";

try {
    $db1 = new PDO("mysql:host=db;dbname=$database", $user, $password);
    echo "<h2>parks</h2><ol>";
    foreach ($db1->query("SELECT * FROM $table") as $row) {
//        echo "<li>" . $row['id'] . ' ' . $row['serial_number'] . ' ' . $row['address'] . "</li>";
        echo "<h4>" . $row['id'] .' '. $row['serial_number'] . ' ' . $row['address'] . "</h4>";
    }
    echo "<h2>cars</h2>";
    foreach ($db1->query("SELECT * FROM $table_cars") as $row) {
        echo "<h4>" . $row['id'] .' '. $row['park_id'] . ' ' . $row['model'] . ' ' . $row['year'] .  ' ' . $row['price'] . "</h4>";
    }
    echo "</ol>";
} catch (PDOException $e) {
    d($e::class, $e->getFile(), $e->getLine(), $e->getMessage());
//    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
