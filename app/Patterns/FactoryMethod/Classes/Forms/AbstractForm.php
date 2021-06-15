<?php

namespace App\Patterns\FactoryMethod\Classes\Forms;

use App\Patterns\AbstractFactory\Interfaces\GuiFactoryInterface;
use App\Patterns\FactoryMethod\Interfaces\FormInterface;

// данный класс являеться главным для данного шаблона,
// он реализовывает в себе механики работы сдругими классами (он не обязан быть абстрактным)
abstract class AbstractForm implements FormInterface
{
    // рисуем форму
    public function render()
    {
        $guiKit = $this->createGuiKit();
        $result[] = $guiKit->buildButton()->draw();
        $result[] = $guiKit->buildCheckbox()->draw();

        return $result;
    }
    // получаем инструментарий для рисования обьектов формы
    abstract function createGuiKit(): GuiFactoryInterface;
}
