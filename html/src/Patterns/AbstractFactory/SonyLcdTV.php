<?php

namespace Root\Html\Patterns\AbstractFactory;

class SonyLcdTV implements LcdTV
{
    public function modelTV(): string
    {
        return '= SonyLcdTV =  <br />';
    }
}