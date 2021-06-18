<?php

namespace App\Models\Tailwind;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property string $code
 * @property int $category_id
 * @property int $position
 * @property string $desc
 * @property string $code_vue
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class Component extends Model
{
    public const TABLE_NAME = 'tailwind_components';
    protected $table = self::TABLE_NAME;

    protected $fillable = [
        'name', 'slug', 'parent_id','position', 'code'
    ];

    public function category(): HasOne
    {
        return $this->hasOne(Category::class,'id', 'category_id');
    }

}

