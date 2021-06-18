<?php

namespace App\Repositories\Tailwind;

use App\Models\Tailwind\Component;
use App\Repositories\AbstractRepository;

class ComponentRepository extends AbstractRepository
{
    protected function modelClass()
    {
        return Component::class;
    }

    public function getLast()
    {
        return $this->getAllQuery([], 'position', 'desc')->first();
    }
}
