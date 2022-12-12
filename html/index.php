<?php
require __DIR__ . '/vendor/autoload.php';

// ======== ДЗ 12. Factory Method: Taxi =============

interface Taxi
{
    public function deliveryService();
}

class TaxiFactory {
    public function createEconomyTaxi(): Taxi
    {
        return new EconomyTaxi();
    }

    public function createStandartTaxi(): Taxi
    {
        return new StandartTaxi();
    }

    public function createLuxTaxi(): Taxi
    {
        return new LuxTaxi();
    }
}

class EconomyTaxi implements Taxi
{
    public function deliveryService()
    {
        echo "Model1 - EconomyTaxi 100 uah";
    }
}

class StandartTaxi implements Taxi
{
    public function deliveryService()
    {
        echo "Model2 - StandartTaxi 200 uah";
    }
}

class LuxTaxi implements Taxi
{
    public function deliveryService()
    {
        echo "Model3 - LuxTaxi 300 uah";
    }
}

$factory = new TaxiFactory();
$economy_taxi = $factory->createEconomyTaxi();
$standart_taxi = $factory->createStandartTaxi();
$lux_taxi = $factory->createLuxTaxi();

$economy_taxi->deliveryService();
echo "<br />";
$standart_taxi->deliveryService();
echo "<br />";
$lux_taxi->deliveryService();
echo "<br />";


