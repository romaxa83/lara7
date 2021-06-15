<?php

namespace App\Patterns\AbstractFactory\Classes\SemanticUI;

use App\Patterns\AbstractFactory\Interfaces\CheckboxInterface;

class CheckboxSemanticUI implements CheckboxInterface
{
    public function draw(): string
    {
        return __CLASS__;
    }
}
