<?php

namespace App\Models\Tailwind;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property int $parent_id
 * @property int $position
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Category extends Model
{
    public const TABLE_NAME = 'tailwind_categories';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'name', 'slug', 'parent_id','position'
    ];

    public function parent(): HasOne
    {
        return $this->hasOne(self::class,'id', 'parent_id');
    }

    public function components(): HasMany
    {
        return $this->hasMany(Component::class,'category_id', 'id');
    }
}

