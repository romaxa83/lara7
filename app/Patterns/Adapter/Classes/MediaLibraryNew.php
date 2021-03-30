<?php

namespace App\Patterns\Adapter\Classes;

use App\Patterns\Adapter\Interfaces\MediaLibraryNewInterface;

// стороняя, новая библиотек для работы с медиа
// закрыта для модификаций
class MediaLibraryNew implements MediaLibraryNewInterface
{
    public function addMedia($pathToFile): string
    {
        \Debugbar::info(__METHOD__);

        return '';
    }

    public function getMedia($fileCode): string
    {
        \Debugbar::info(__METHOD__);

        return '';
    }
}
