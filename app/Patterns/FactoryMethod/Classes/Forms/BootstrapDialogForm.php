<?php

namespace App\Patterns\FactoryMethod\Classes\Forms;

use App\Patterns\AbstractFactory\Factories\BootstrapFactory;
use App\Patterns\AbstractFactory\Interfaces\GuiFactoryInterface;

class BootstrapDialogForm extends AbstractForm
{
    public function createGuiKit(): GuiFactoryInterface
    {
        return new BootstrapFactory();
    }
}
