<?php

namespace App\Patterns\Adapter\Interfaces;

// интерфейс с которым работает стороняя библиотека
interface MediaLibraryNewInterface
{
    // загрузка изображения
    public function addMedia($pathToFile): string;

    // получить изображение по имени
    public function getMedia($fileCode): string;
}
