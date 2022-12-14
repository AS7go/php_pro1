<?php

namespace Root\Html\Patterns\AbstractFactory;

class LGLedTV implements LedTV
{
    public function modelTV(): string
    {
        return '- LGLedTV - <br />';
    }
}