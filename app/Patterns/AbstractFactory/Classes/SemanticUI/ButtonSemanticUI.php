<?php

namespace App\Patterns\AbstractFactory\Classes\SemanticUI;

use App\Patterns\AbstractFactory\Interfaces\ButtonInterface;

class ButtonSemanticUI implements ButtonInterface
{
    public function draw(): string
    {
        return __CLASS__;
    }
}
