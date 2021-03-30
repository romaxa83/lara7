<?php

namespace App\Patterns\Adapter\Interfaces;

// интерфейс для работы с медиа
// который используеться в нашем проекте
interface MediaLibraryInterface
{
    // загрузка изображения
    public function upload($pathToFile): string;

    // получить изображение по имени
    public function get($fileCode): string;
}

