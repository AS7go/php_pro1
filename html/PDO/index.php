<?php

require_once __DIR__ . '/classes/Car.php';
require_once __DIR__ . '/classes/DB.php';

//require __DIR__ . '/PDO/index.php';

try {
    $serial_number = "#1119";
    $address = "Kharkov3";

    $query = DB::connect()->prepare("INSERT INTO parks (serial_number, address) VALUES (:serial_number, :address)");

    $query->execute(compact('serial_number', 'address'));
    d(DB::connect()->lastInsertId());

} catch (PDOException $exception) {
    d($exception->getMessage());
}



