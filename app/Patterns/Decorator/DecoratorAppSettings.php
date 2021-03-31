<?php

namespace App\Patterns\Decorator;

use App\Patterns\Decorator\Classes\OrderUpdate;
use App\Patterns\Decorator\Interfaces\OrderUpdateInterface;
use App\Patterns\Decorator\Models\Order;
use Illuminate\Support\Collection;

// пример реазизации декораторов типа runtime
// нужные декораторы подключаем из конфига
class DecoratorAppSettings
{
    public function run()
    {
        $settings = $this->getEnabledSettings();
        $updateOrderObj = $this->createrUpdater($settings);

        $order = new Order();
        $orderData = [];

        $updateOrderObj->run($order, $orderData);
    }

    // получаем настройки для декораторов
    private function getEnabledSettings(): Collection
    {
        $settings = config('order-updaters.fromWeb');

        return collect($settings)->where('enabled', 1);
    }

    private function createrUpdater(Collection $settings): OrderUpdateInterface
    {
        $updaterOrderObj = new OrderUpdate();

        $settings->each(
            function ($setting) use (&$updaterOrderObj){
                $className = $setting['decorator_class'];

                $updaterOrderObj = (new $className($updaterOrderObj));
            }
        );

//        dd($updaterOrderObj);

        return $updaterOrderObj;
    }
}
