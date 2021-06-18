<?php

namespace App\Repositories\Tailwind;

use App\Models\Tailwind\Category;
use App\Repositories\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    protected function modelClass()
    {
        return Category::class;
    }
}

