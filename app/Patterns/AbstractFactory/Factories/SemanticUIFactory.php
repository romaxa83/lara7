<?php

namespace App\Patterns\AbstractFactory\Factories;

use App\Patterns\AbstractFactory\Classes\SemanticUI\ButtonSemanticUI;
use App\Patterns\AbstractFactory\Classes\SemanticUI\CheckboxSemanticUI;
use App\Patterns\AbstractFactory\Interfaces\ButtonInterface;
use App\Patterns\AbstractFactory\Interfaces\CheckboxInterface;
use App\Patterns\AbstractFactory\Interfaces\GuiFactoryInterface;

class SemanticUIFactory implements GuiFactoryInterface
{
    public function buildButton(): ButtonInterface
    {
        return new ButtonSemanticUI();
    }

    public function buildCheckbox(): CheckboxInterface
    {
        return new CheckboxSemanticUI();
    }
}
