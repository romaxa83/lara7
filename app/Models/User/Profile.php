<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property int $user_id
 */

class Profile extends Model
{
    public $timestamps = false;

    protected $table = 'users_profile';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
