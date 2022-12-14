<?php

namespace Root\Html\Patterns\AbstractFactory;

class LGFactory implements TVFactory
{
    public function createLed(): LedTV
    {
        return new LGLedTV();
    }
    public function createLcd(): LcdTV
    {
        return new LGLcdTV();
    }
}