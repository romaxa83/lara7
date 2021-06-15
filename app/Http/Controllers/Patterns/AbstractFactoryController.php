<?php

namespace App\Http\Controllers\Patterns;

use App\Http\Controllers\Controller;
use App\Patterns\AbstractFactory\GuiKitFactory;

class AbstractFactoryController extends Controller
{

    public function index($type)
    {
        $title = 'Абстрактная фабрика';

        $guiKit = (new GuiKitFactory())->getFactory($type);

        $result[] = $guiKit->buildButton()->draw();
        $result[] = $guiKit->buildCheckbox()->draw();

        if($type == GuiKitFactory::TYPE_BOOTSTRAP){
            $type = GuiKitFactory::TYPE_SEMANTICUI;
        } else {
            $type = GuiKitFactory::TYPE_BOOTSTRAP;
        }

        return view('patterns.abstract-factory.index', [
            'result' => $result,
            'type' => $type,
            'title' => $title
        ]);
    }
}

