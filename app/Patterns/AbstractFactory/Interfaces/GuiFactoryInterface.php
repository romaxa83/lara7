<?php

namespace App\Patterns\AbstractFactory\Interfaces;

interface GuiFactoryInterface
{
    public function buildButton(): ButtonInterface;

    public function buildCheckbox(): CheckboxInterface;
}
