<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;

abstract class AbstractRepository
{
    protected Model $model;

    public function __construct()
    {
        $this->model = app($this->modelClass());
    }

    abstract protected function modelClass();

    public function getQuery(): Builder
    {
        return $this->model::query();
    }

    public function getAllQuery(array $relations = [], $sortField = 'id', $sort = 'asc'): Builder
    {
        return $this->getQuery()->with($relations)->orderBy($sortField, $sort);
    }

    public function getAll(array $relations = [], $sortField = 'id', $sort = 'asc'): Collection
    {
        return $this->getAllQuery($relations, $sortField, $sort)->get();
    }

    public function getAllWithCount(array $relations = []): Collection
    {
        return $this->getQuery()->withCount($relations)->get();
    }

    public function getForSelect($field, array $relations = []): array
    {
        return $this->getAllQuery($relations)->pluck($field, 'id')->toArray();
    }

    /*
     *  Get one model
     */

    public function getOneQuery(
        string $field,
        string $value,
        array $relations = []
    ): Builder
    {
        return $this->getQuery()
            ->with($relations)
            ->where($field, $value);
    }

    public function getOneBy(
        string $field,
        string $value,
        array $relations = []
    ): ?Model
    {
        return $this->getOneQuery($field, $value, $relations)->first();
    }

    public function findOneBy(
        string $field,
        string $value,
        array $relations = []
    ): Model
    {
        if($model = $this->getOneBy($field, $value, $relations)){
            return $model;
        }

        throw new \DomainException("Not found model", Response::HTTP_NOT_FOUND);
    }
}
