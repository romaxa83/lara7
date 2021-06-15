<?php

namespace App\Patterns\AbstractFactory\Factories;

use App\Patterns\AbstractFactory\Classes\Bootstrap\ButtonBootstrap;
use App\Patterns\AbstractFactory\Classes\Bootstrap\CheckboxBootstrap;
use App\Patterns\AbstractFactory\Interfaces\ButtonInterface;
use App\Patterns\AbstractFactory\Interfaces\CheckboxInterface;
use App\Patterns\AbstractFactory\Interfaces\GuiFactoryInterface;

class BootstrapFactory implements GuiFactoryInterface
{
    public function buildButton(): ButtonInterface
    {
        return new ButtonBootstrap();
    }

    public function buildCheckbox(): CheckboxInterface
    {
        return new CheckboxBootstrap();
    }
}
