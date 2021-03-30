<?php

namespace App\Patterns\Adapter\Classes;

use App\Patterns\Adapter\Interfaces\MediaLibraryInterface;
use App\Patterns\Adapter\Interfaces\MediaLibraryNewInterface;

// класс адаптер который реализует интерфес (используемые в нашем проекте)
// но использует метода стороней библиотеки
class MediaLibraryAdapter implements MediaLibraryInterface
{
    private MediaLibraryNewInterface $adapterObj;

    public function __construct()
    {
        $this->adapterObj = new MediaLibraryNew();
    }

    public function upload($pathToFile): string
    {
        return $this->adapterObj->addMedia($pathToFile);
    }

    public function get($fileCode): string
    {
        return $this->adapterObj->getMedia($fileCode);
    }

    /**
     * если у новой библиотеки есть другие методы И можно вызвать черес call
     * это не являеться частью паттерна adapter, но часто необходим и приводиться как пример
    */
    public function __call($name, $arguments)
    {
        if (method_exists($this->adapterObj, $name)) {
            return call_user_func_array([$this->adapterObj, $name],$arguments);
        }

        throw new \Exception("Метод {$name} не найден");
    }
}
