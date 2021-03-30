<?php

namespace App\Http\Controllers\Patterns;

use App\Models\Customer;
use App\Models\Region;
use App\Http\Controllers\Controller;
use App\Patterns\Adapter\Classes\MediaLibraryOld;
use App\Patterns\Adapter\Interfaces\MediaLibraryInterface;
use App\Patterns\Composite\Orders\OrderPriceComposite;

class AdapterController extends Controller
{
    public function index()
    {
        $name = 'Адаптер';

        // подключение реализаций интерфейса в AppServiceProvider
        // где можем подключать разную реализацию
        $mediaLibrary = app(MediaLibraryInterface::class);

        $result[] = $mediaLibrary->upload('ImageFile');
        $result[] = $mediaLibrary->get('ImageFile');

        return view('patterns.adapter.index');
    }
}
