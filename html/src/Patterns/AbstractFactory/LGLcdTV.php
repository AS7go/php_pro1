<?php

namespace Root\Html\Patterns\AbstractFactory;

class LGLcdTV implements LcdTV
{
    public function modelTV(): string
    {
        return '- LGLcdTV - <br />';
    }
}