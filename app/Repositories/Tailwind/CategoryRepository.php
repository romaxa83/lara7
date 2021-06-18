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

    public function getLast()
    {
        return $this->getAllQuery([], 'position', 'desc')->first();
    }

    public function existByName($name): bool
    {
        return $this->getQuery()->where('name', $name)->exists();
    }
}

