<?php

namespace Root\Html\Patterns\AbstractFactory;

class SonyLedTV implements LedTV
{
    public function modelTV(): string
    {
        return '= SonyLedTV =  <br />';
    }
}