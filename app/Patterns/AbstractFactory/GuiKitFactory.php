<?php

namespace App\Patterns\AbstractFactory;

use App\Patterns\AbstractFactory\Factories\BootstrapFactory;
use App\Patterns\AbstractFactory\Factories\SemanticUIFactory;
use App\Patterns\AbstractFactory\Interfaces\GuiFactoryInterface;

class GuiKitFactory
{
    const TYPE_BOOTSTRAP = 'bootstrap';
    const TYPE_SEMANTICUI = 'semanticui';

    /*
     * возвращается фабрика, которая порождает группу
     * связаных обьектов
     */
    public function getFactory($type): GuiFactoryInterface
    {
        switch ($type) {
            case self::TYPE_BOOTSTRAP:
                $factory = new BootstrapFactory();
                break;
            case self::TYPE_SEMANTICUI:
                $factory = new SemanticUIFactory();
                break;
            default:
                throw new \Exception("Not definite type for factory [{$type}]");
        }

        return $factory;
    }
}
