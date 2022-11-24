<?php
require __DIR__ . '/vendor/autoload.php';

//     require __DIR__. '/output.php';

class ValueObject
{
    private int $red;
    private int $green;
    private int $blue;

    function __construct(int $red, int $green, int $blue)
    {
        if($this->rgbValidate($red,'Red')) {
            $this->red = $red;
        }
        if($this->rgbValidate($green, 'Green')) {
            $this->green = $green;
        }
        if($this->rgbValidate($blue, 'Blue')) {
            $this->blue = $blue;
        }

    }

// === get ===
    public function getRed()
    {
        return $this->red;
    }

    public function getGreen()
    {
        return $this->green;
    }

    public function getBlue()
    {
        return $this->blue;
    }
// === Private set ===
    private function setRed($red)
    {
        $this->red = $red;
    }

    private function setGreen($green)
    {
        $this->green = $green;
    }

    private function setBlue($blue)
    {
        $this->blue = $blue;
    }
// === setRGB Private rgbValidate ===
    public function setRGB($r = false, $g = false, $b = false)
    {
        if ($this->rgbValidate($r, 'Red')) {
            $this->setRed($r);
        }

        if ($this->rgbValidate($g, 'Green')) {
            $this->setGreen($g);
        }

        if ($this->rgbValidate($b, 'Blue')) {
            $this->setBlue($b);
        }
    }
// === Exception  rgbValidate ===

    private function rgbValidate(int $code, $name)
    {
        $code = 354;
        $name = 'Green';
        if (!is_numeric($code) || $code < 0 || $code > 255) {
            return throw new Exception($name . ' = ' . $code . ' <--- color is out of range or not int !!! ');
        }

        return true;
    }
// === mix ===
    public function mix($obj)
    {
        $mRed=round(($obj->getRed()+$this->red)/2); //расчет среднего значения Red
        $mGreen=round(($obj->getGreen()+$this->green)/2);
        $mBlue=round(($obj->getBlue()+$this->blue)/2);
        $obj->setRGB($mRed, $mGreen, $mBlue);
        return $obj;
    }
}


class Index
{
    private $rgb;
    private $rgb2;

    function __construct()
    {
        $this->rgb = $this->random(); //в rgb присваиваем сгенерированное значение из random()
        $this->rgb2 = $this->random();
        $this->init();
    }

    public function init()
    {
//        $mixedColor = $this->rgb->mix(new ValueObject(100, 100, 100));
        $mixedColor = $this->rgb->mix(new ValueObject($this->rgb2->getRed(), $this->rgb2->getGreen(), $this->rgb2->getBlue()));
// код для наглядности
        echo '<div style="display: grid; grid-template-columns: 1fr 1fr 1fr; width: 255px; column-gap: 15px">';
        echo '<div style="width: 170px; height: 120px; color: white; background-color: rgb(' . $this->rgb->getRed() . ',' . $this->rgb->getGreen() . ',' . $this->rgb->getBlue() . '); display: flex; align-items: center; justify-content: center;">rgb(' . $this->rgb->getRed() . ',' . $this->rgb->getGreen() . ',' . $this->rgb->getBlue() . ')</div>';
        echo '<div style="width: 170px; height: 120px; color: white; background-color: rgb(' . $this->rgb2->getRed() . ',' . $this->rgb2->getGreen() . ',' . $this->rgb2->getBlue() . '); display: flex; align-items: center; justify-content: center;">rgb(' . $this->rgb2->getRed() . ',' . $this->rgb2->getGreen() . ',' . $this->rgb2->getBlue() . ')</div>';
        echo '<div style="width: 170px; height: 120px; color: white; background-color: rgb(' . $mixedColor->getRed() . ',' . $mixedColor->getGreen() . ',' . $mixedColor->getBlue() . '); display: flex; align-items: center; justify-content: center;">rgb(' . $mixedColor->getRed() . ',' . $mixedColor->getGreen() . ',' . $mixedColor->getBlue() . ')</div>';
        echo '</div>';
        echo '<p><strong>Is equals:</strong> ' . ($this->equals($this->rgb, $this->rgb2) ? 'true' : 'false') . '</p>';
    }

    // === Equals ===
    public function equals($color, $color_2)
    {
        return $color == $color_2;
    }

    // === Random ===
    public static function random()
    {
        $red = random_int(0, 255);
        $green = random_int(0, 255);
        $blue = random_int(0, 255);

        return new ValueObject($red, $green, $blue);
    }

}

new Index();


//=== ДЗ-4 Заняття Заняття 3 Знайомство з ООП в php.
//ДЗ 4. Створити клас ValueObject для кольорів у форматі RGB
//
//Клас повинен містити три приватні властивості:
//
//red
//green
//blue
//
//
//Конструктор класу повинен приймати параметри для кожного кольору.
//
//Для всіх властивостей створити публічні гетери та приватні сеттери (методи які починаються на слово (get... | set...) та виводять або задають значення полям класу) .
//
//У сеттерах кольорів перевірити значення, що передається на діапазон від 0 до 255. Якщо число, що передається, виходить за діапазон - викинути виняток (Exception).
//
//Реалізувати метод equals, який порівнюватиме об'єкти кольорів і повертатиме true або false.
//
//Реалізуватиме статичний метод random, який повертатиме об'єкт RGB кольору з випадковими значеннями властивостей red, green, blue.
//
//Реалізувати метод mix, який буде змішувати колір беручи середнє значення з трьох кольорів.
//
//Приклад методу mix:
//
//$color = new Color(200, 200, 200);
//$mixedColor = $color->mix(new Color(100, 100, 100));
//$mixedColor->getRed(); // 150
//$mixedColor->getGreen(); // 150
//$mixedColor->getBlue(); // 150
//===================================

