<?php

namespace App\Services\Tailwind;

use App\Models\Tailwind\Category;
use App\Repositories\Tailwind\CategoryRepository;


class CategoryService
{
    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): Category
    {
        try {
            $last = $this->repository->getLast();

            $model = new Category();
            $model->name = $data['name'];
            $model->slug = \Str::slug($data['name'], '-');
            $model->position = $last ? $last->position + 1 : 0;
            $model->parent_id = $data['parent_id'] ?? null;

            $model->save();

            return $model;
        } catch (\Exception $e){
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}
