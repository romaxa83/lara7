<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Patterns\Adapter\Interfaces\MediaLibraryInterface;

class AdapterController extends Controller
{
    public function index()
    {
        $title = 'Адаптер';

        // подключение реализаций интерфейса в AppServiceProvider
        // где можем подключать разную реализацию
        $mediaLibrary = app(MediaLibraryInterface::class);

        $result[] = $mediaLibrary->upload('ImageFile');
        $result[] = $mediaLibrary->get('ImageFile');

        return view('patterns.adapter.index', compact('title'));
    }
}
