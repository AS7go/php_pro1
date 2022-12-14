<?php

namespace Root\Html\Patterns\AbstractFactory;

interface TVFactory
{
    public function createLed(): LedTV;
    public function createLcd(): LcdTV;
}