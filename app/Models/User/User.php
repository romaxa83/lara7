<?php

namespace App\Models\User;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 * @property string $login
 * @property string $email
 * @property string $password
 * @property Carbon $email_verified_at
 * @property string $remember_token
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */

class User extends Authenticatable
{
    use Notifiable;

    const STATUS_DRAW = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_BAN = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->profile->first_name} {$this->profile->last_name}";
    }

    // relation
    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function logins()
    {
        return $this->hasMany(Login::class);
    }

    //scope
    public function scopeWithLastLoginAt(Builder $query)
    {
        $query->addSelect(['last_login_at' => Login::select('created_at')
            ->whereColumn('user_id', 'users.id')
            ->latest()
            ->take(1)
            ])
            ->withCasts(['last_login_at' => 'datetime']);
    }

    public function scopeWithLastLoginIpAddress(Builder $query)
    {
        $query->addSelect(['last_login_ip_address' => Login::select('ip_address')
            ->whereColumn('user_id', 'users.id')
            ->latest()
            ->take(1)
        ]);
    }
}
