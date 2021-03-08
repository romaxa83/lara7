<?php

namespace App\Patterns\Composite\Orders;

use App\Patterns\Composite\Orders\Classes\ObjectsFactory;

class OrderPriceComposite
{
    private $facory;

    private $ingredientCount = 10;
    private $ingredients = [];

    private $productCount = 6;
    private $products = [];

    private $orderCount = 4;
    private $orders = [];

    public function __construct()
    {
        $this->facory = new ObjectsFactory();
    }

    public function run()
    {
        $this->initObjects();
        $this->calcPrices();
    }

    public function initObjects()
    {
        $this->ingredients = $this->facory->createIngredients($this->ingredientCount);
        $this->products = $this->facory->createProducts($this->productCount, $this->ingredients);
        $this->orders = $this->facory->createOrders($this->orderCount, $this->products);
    }

    public function calcPrices()
    {
        $result = [];
        foreach ($this->orders as $order){
            $result[] = [
                'order_id' => $order->id,
                'order_price' => $order->calcPrice(),
            ];
        }

        \Debugbar::info($result, $this->orders);
    }
}
