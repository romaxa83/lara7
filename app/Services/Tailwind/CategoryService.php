<?php

namespace App\Services\Tailwind;

use App\Models\Tailwind\Category;

class CategoryService
{
    public function create(array $data): Category
    {
        try {
            $model = new Category();
            $model->name = $data['name'];
            $model->slug = \Str::slug($data['name'], '-');
            $model->position = $data['position'] ?? 0;
            $model->parent_id = $data['parent_id'] ?? null;

            $model->save();

            return $model;
        } catch (\Exception $e){
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}
