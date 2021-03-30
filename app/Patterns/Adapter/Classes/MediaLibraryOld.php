<?php

namespace App\Patterns\Adapter\Classes;

use App\Patterns\Adapter\Interfaces\MediaLibraryInterface;

// старая библиотек для работы с медиа
// которая используеться в проекте через интерфейс
class MediaLibraryOld implements MediaLibraryInterface
{
    public function upload($pathToFile): string
    {
        \Debugbar::info(__METHOD__);

        return md5(__METHOD__ . $pathToFile);
    }

    public function get($fileCode): string
    {
        \Debugbar::info(__METHOD__);

        return '';
    }
}
