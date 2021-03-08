<?php

namespace App\Patterns\Composite\Orders\Classes;

use App\Patterns\Composite\Orders\Models\Ingredient;
use App\Patterns\Composite\Orders\Models\Order;
use App\Patterns\Composite\Orders\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class ObjectsFactory
{
    private $faker;

    public function __construct()
    {
        $this->faker = app(Faker::class);
    }

    public function createIngredients(int $count): array
    {
        $result = [];
        for ($i = 1; $i <= $count; $i++){
            $result[] = $this->createIngredient($i);
        }

        return $result;
    }

    public function createIngredient(int $id)
    {
        $model = new Ingredient();
        $model->id = $id;
        $model->name = $this->faker->colorName;

        return $model;
    }

    public function createProducts(int $count, array $ingredients): array
    {
        $result = [];
        for ($i = 1; $i <= $count; $i++){
            $productIngredients = Arr::random($ingredients, rand(2, 3));

            $result[] = $this->createProduct($i, $productIngredients);
        }

        return $result;
    }

    public function createProduct(int $id, array $ingredients)
    {
        $model = new Product();
        $model->id = $id;
        $model->name = $this->faker->company;

        foreach ($ingredients as $ingredient){
            $model->setChildItem($ingredient);
        }

        return $model;
    }

    public function createOrders(int $count, array $products): array
    {
        $result = [];
        for ($i = 1; $i <= $count; $i++){
            $orderProducts = Arr::random($products, rand(1, 4));

            $result[] = $this->createOrder($i, $orderProducts);
        }

        return $result;
    }

    public function createOrder(int $id, array $products)
    {
        $model = new Order();
        $model->id = $id;
        $model->name = "order_{$id}";

        foreach ($products as $product){
//            dd($product);
            $model->setChildItem($product);
        }

        return $model;
    }
}
