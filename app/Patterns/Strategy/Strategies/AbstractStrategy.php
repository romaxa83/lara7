<?php

namespace App\Patterns\Strategy\Strategies;

use App\Patterns\Strategy\Interfaces\SalaryStrategyInterface;

abstract class AbstractStrategy implements SalaryStrategyInterface
{
    public function calc($period, $user): int
    {
        return rand(500, 2000);
    }

    public function getName(): string
    {
        return class_basename(static::class);
    }
}
