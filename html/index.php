<?php
require __DIR__ . '/vendor/autoload.php';

// ======= Factory Method =======

interface Taxi
{
    public function modelTaxi(string $model);
    public function priceTaxi(int $price);
}

class EconomyTaxi implements Taxi
{
    public function modelTaxi(string $model)
    {
        echo "The economy taxi delivery $model <br />";
    }

    public function priceTaxi(int $price)
    {
        echo "The economy taxi price $price <br />";
    }
}

class StandartTaxi implements Taxi
{
    public function modelTaxi(string $model)
    {
        echo "The standart taxi delivery $model <br />";
    }
    public function priceTaxi(int $price)
    {
        echo "The standart taxi price $price <br />";
    }
}

class LuxTaxi implements Taxi
{
    public function modelTaxi(string $model)
    {
        echo "The lux taxi delivery $model <br />";
    }
    public function priceTaxi(int $price)
    {
        echo "The lux taxi price $price <br />";
    }
}

abstract class Creator
{
    abstract public function factoryMethod(): Taxi;

    public function deliverTaxi(string $modelName, int $priceUAH)
    {
        $transport = $this->factoryMethod();

        $transport->modelTaxi($modelName);
        $transport->priceTaxi($priceUAH);
    }
}

class EconomyTaxiCreator1 extends Creator
{
    public function factoryMethod(): Taxi
    {
        return new EconomyTaxi();
    }
}

class StandartTaxiCreator2 extends Creator
{
    public function factoryMethod(): Taxi
    {
        return new StandartTaxi();
    }
}

class LuxTaxiCreator3 extends Creator
{
    public function factoryMethod(): Taxi
    {
        return new LuxTaxi();
    }
}


function clientCode(Creator $creator, string $model, int $price)
{
    $creator->deliverTaxi($model, $price);
}

echo "<br />";
clientCode(new EconomyTaxiCreator1, 'model 1', 100);
echo "<br />";
clientCode(new StandartTaxiCreator2, 'model 2', 200);
echo "<br />";
clientCode(new LuxTaxiCreator3, 'model 3', 300);
echo "<br />";


// ======== ДЗ 12. Factory Method: Taxi ===================================
//
// Заняття 8. SOLID, Factory Method, Abstract Factory
//
// Побудувати систему таксі.
//
// Клієнтський код повинен викликати тип доставки, який у свою чергу віддаватиме машину
// відповідного типу, яка матиме 2 методи (виведення моделі машини та виведення ціни).
//
// Усього буде 3 типи таксі:
//
// Економ
// Стандарт
// Люкс
// =====================================================================
