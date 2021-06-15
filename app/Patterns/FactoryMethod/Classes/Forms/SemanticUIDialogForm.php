<?php

namespace App\Patterns\FactoryMethod\Classes\Forms;

use App\Patterns\AbstractFactory\Factories\SemanticUIFactory;
use App\Patterns\AbstractFactory\Interfaces\GuiFactoryInterface;

class SemanticUIDialogForm extends AbstractForm
{
    public function createGuiKit(): GuiFactoryInterface
    {
        return new SemanticUIFactory();
    }
}
