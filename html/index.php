<?php
require __DIR__ . '/vendor/autoload.php';


$user = "root";
$password = "secret";
$database = "autoparc";
$table = "parks";

try {
    $db1 = new PDO("mysql:host=db;dbname=$database", $user, $password);
    echo "<h2>Autoparc</h2><ol>";
    foreach ($db1->query("SELECT * FROM $table") as $row) {
        echo "<li>" . $row['id'] . ' ' . $row['serial_number'] . ' ' . $row['address'] . "</li>";
    }
    echo "</ol>";
} catch (PDOException $e) {
    d($e::class, $e->getFile(), $e->getLine(), $e->getMessage());
//    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
