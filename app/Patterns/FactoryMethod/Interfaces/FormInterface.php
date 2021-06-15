<?php

namespace App\Patterns\FactoryMethod\Interfaces;

use App\Patterns\AbstractFactory\Factories\SemanticUIFactory;
use App\Patterns\AbstractFactory\Interfaces\GuiFactoryInterface;

interface FormInterface
{
    public function render();
}
