<?php

namespace Root\Html\Patterns\AbstractFactory;

class SonyFactory implements TVFactory
{
    public function createLed(): LedTV
    {
        return new SonyLedTV();
    }
    public function createLcd(): LcdTV
    {
        return new SonyLcdTV();
    }
}