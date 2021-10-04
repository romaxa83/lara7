<?php

namespace App\Models;

use App\Collections\CustomerEloquentCollection;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function newCollection(array $models = []): CustomerEloquentCollection
    {
        return CustomerEloquentCollection::make($models);
    }

    public static function booted()
    {
        static::addGlobalScope(function ($query) {
            if (is_null($query->getQuery()->columns)) {
                $query->select('*');
            }

            if (config('database.default') === 'mysql') {
                $query->selectRaw('ST_X(location) as latitude, ST_Y(location) as longitude');
            }

            if (config('database.default') === 'sqlite') {
                throw new \Exception('This lesson does not support SQLite.');
            }

            if (config('database.default') === 'pgsql') {
                $query->selectRaw('ST_Y(location::geometry) as latitude, ST_X(location::geometry) as longitude');
            }
        });
    }

    public function scopeInRegion($query, Region $region)
    {
        if (config('database.default') === 'mysql') {
            $query->whereRaw('ST_Contains(?, customers.location)', [$region->geometry]);
        }

        if (config('database.default') === 'sqlite') {
            throw new \Exception('This lesson does not support SQLite.');
        }

        if (config('database.default') === 'pgsql') {
            $query->whereRaw('ST_Contains(?, customers.location::geometry)', [$region->geometry]);
        }
    }
}
