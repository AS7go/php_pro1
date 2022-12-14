<?php

use Root\Html\Patterns\AbstractFactory\LGFactory;
use Root\Html\Patterns\AbstractFactory\SonyFactory;
use Root\Html\Patterns\AbstractFactory\TVFactory;

function clientCode(TVFactory $factory)
{
    echo "<br />";
    echo $factory->createLed()->modelTV();
    echo $factory->createLcd()->modelTV();
    echo "<br />";

}

echo "LG TV <br />";
$lgFactory = new LGFactory();
clientCode($lgFactory);

echo "Sony TV <br />";
$sonyFactory = new SonyFactory();
clientCode($sonyFactory);
