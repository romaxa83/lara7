<?php

namespace App\Services\Tailwind;

use App\Models\Tailwind\Component;
use App\Repositories\Tailwind\ComponentRepository;

class ComponentService
{
    private ComponentRepository $repository;

    public function __construct(ComponentRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create(array $data): Component
    {
        try {

            $last = $this->repository->getLast();

            $model = new Component();
            $model->name = $data['name'];
            $model->slug = \Str::slug($data['name'], '-');
            $model->position = $last ? $last->position + 1 : 0;
            $model->category_id = $data['category_id'];
            $model->code = $data['code'];
            $model->code_vue = $data['code_vue'] ?? null;
            $model->desc = $data['desc'] ?? null;

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
            $model->code_vue = $data['code_vue'] ?? null;
            $model->desc = $data['desc'] ?? null;

            $model->save();

            return $model;
        } catch (\Exception $e){
            \Log::error($e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }
}
