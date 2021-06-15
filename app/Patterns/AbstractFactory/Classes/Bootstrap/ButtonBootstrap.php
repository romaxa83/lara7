<?php

namespace App\Patterns\AbstractFactory\Classes\Bootstrap;

use App\Patterns\AbstractFactory\Interfaces\ButtonInterface;

class ButtonBootstrap implements ButtonInterface
{
    public function draw(): string
    {
        return __CLASS__;
    }
}
