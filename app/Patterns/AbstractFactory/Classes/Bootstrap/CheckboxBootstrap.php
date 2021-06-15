<?php

namespace App\Patterns\AbstractFactory\Classes\Bootstrap;

use App\Patterns\AbstractFactory\Interfaces\CheckboxInterface;

class CheckboxBootstrap implements CheckboxInterface
{
    public function draw(): string
    {
        return __CLASS__;
    }
}
