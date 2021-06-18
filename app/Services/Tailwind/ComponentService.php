<?php

namespace App\Services\Tailwind;

use App\Models\Tailwind\Component;

class ComponentService
{
    public function create(array $data): Component
    {
        try {
            $model = new Component();
            $model->name = $data['name'];
            $model->slug = \Str::slug($data['name'], '-');
            $model->position = $data['position'] ?? 0;
            $model->category_id = $data['category_id'];
            $model->code = $data['code'];

            $model->save();

            return $model;
        } catch (\Exception $e){
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }

    public function edit(array $data, Component $model): Component
    {
        try {

            $model->name = $data['name'];
            $model->position = $data['position'];
            $model->category_id = $data['category_id'];
            $model->code = $data['code'];

            $model->save();

            return $model;
        } catch (\Exception $e){
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}
