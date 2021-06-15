<?php

namespace App\Http\Controllers\Patterns;

use App\Models\Customer;
use App\Models\Region;
use App\Http\Controllers\Controller;
use App\Models\User\User;
use App\Patterns\AbstractFactory\GuiKitFactory;
use App\Patterns\Adapter\Classes\MediaLibraryOld;
use App\Patterns\Adapter\Interfaces\MediaLibraryInterface;
use App\Patterns\Composite\Orders\OrderPriceComposite;
use App\Patterns\Decorator\Classes\OrderUpdate;
use App\Patterns\Decorator\Classes\OrderUpdateWeb;
use App\Patterns\Decorator\DecoratorApp;
use App\Patterns\Decorator\DecoratorAppSettings;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorLogger;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierManagers;
use App\Patterns\Decorator\Decorators\OrderUpdateDecorators\OrderUpdateDecoratorNotifierUsers;
use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;
use App\Patterns\Strategy\SalaryManager;
use Carbon\Carbon;

class AbstractFactoryController extends Controller
{

    public function index($type)
    {
        $name = 'Абстрактная фабрика';



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
            'type' => $type
        ]);
    }
}

