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
 * @property int $status
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

    public function isDraw(): bool
    {
        return $this->status == self::STATUS_DRAW;
    }

    public function isActive(): bool
    {
        return $this->status == self::STATUS_ACTIVE;
    }

    public function isBan(): bool
    {
        return $this->status == self::STATUS_BAN;
    }

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

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    //scope
    // получение данных по последнему логину
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

    public function scopeOrderLastLogin(Builder $query)
    {
        $query->orderByDesc(Login::select('created_at')
            ->whereColumn('user_id', 'users.id')
            ->latest()
            ->take(1)
        );
    }

    // код использует обьединение и поиск по регулярке
    public function scopeSearch(Builder $query, string $terms = null)
    {
        if (config('database.default') === 'mysql' || config('database.default') === 'sqlite') {
            collect(str_getcsv($terms, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = $term.'%';
                $query->whereIn('id', function ($query) use ($term) {
                    $query->select('id')
                        ->from(function ($query) use ($term) {
                            $query->select('users.id')
                                ->from('users')
                                ->where('users.login', 'ilike', $term)
                                ->union(
                                    $query->newQuery()
                                        ->select('users.id')
                                        ->from('users')
                                        ->join('companies', 'users.company_id', '=', 'companies.id')
                                        ->where('companies.name', 'ilike', $term)
                                )
                                ->union(
                                    $query->newQuery()
                                        ->select('users.id')
                                        ->from('users')
                                        ->join('users_profile', 'users.id', '=', 'users_profile.user_id')
                                        ->where('users_profile.first_name', 'ilike', $term)
                                        ->orWhere('users_profile.last_name', 'ilike', $term)
                                )
                            ;
                        }, 'matches');
                });
            });
        }

        if (config('database.default') === 'pgsql') {
            collect(str_getcsv($terms, ' ', '"'))->filter()->each(function ($term) use ($query) {
                $term = preg_replace('/[^A-Za-z0-9]/', '', $term).'%';
                $query->whereIn('id', function ($query) use ($term) {
                    $query->select('id')
                        ->from(function ($query) use ($term) {
                            $query->select('users.id')
                                ->from('users')
                                ->whereRaw("regexp_replace(users.login, '[^A-Za-z0-9]', '') ilike ?", [$term])
                                ->union(
                                    $query->newQuery()
                                        ->select('users.id')
                                        ->from('users')
                                        ->join('users_profile', 'users.id', '=', 'users_profile.user_id')
                                        ->whereRaw("regexp_replace(users_profile.last_name, '[^A-Za-z0-9]', '') ilike ?", [$term])                                        ->where('users_profile.first_name', 'ilike', $term)
                                        ->orWhereRaw("regexp_replace(users_profile.first_name, '[^A-Za-z0-9]', '') ilike ?", [$term])                                        ->where('users_profile.first_name', 'ilike', $term)
                                )
                                ->union(
                                    $query->newQuery()
                                        ->select('users.id')
                                        ->from('users')
                                        ->join('companies', 'users.company_id', '=', 'companies.id')
                                        ->whereRaw("regexp_replace(companies.name, '[^A-Za-z0-9]', '') ilike ?", [$term])
                                )
                            ;
                        }, 'matches');
                });
            });
        }
    }

    // рабочий код
//    public function scopeSearch(Builder $query, string $terms = null)
//    {
//        //результат у функций одинаковый ,но первая работает быстрее
//        //str_getcsv($terms, ' ', '"');
//        //explode(' ', $terms);
//
//
//        if (config('database.default') === 'mysql' || config('database.default') === 'sqlite') {
//            collect(explode(' ', $terms))->filter()->each(function ($term) use ($query) {
//                $term = $term.'%';
//                $query->where(function (Builder $query) use ($term) {
//                    $query->where('login', 'like', $term)
//                        ->orWhereIn('company_id', function (Builder $query) use ($term){
//                            $query->select('id')
//                                ->from('companies')
//                                ->where('name', 'like', $term);
//                        })
//                        ->orWhereHas('profile', function (Builder $query) use ($term) {
//                            $query->where('first_name', 'like', $term)
//                                ->orWhere('last_name', 'like', $term);
//                        })
//                    ;
//                });
//            });
//        }
//
//        if (config('database.default') === 'pgsql') {
//            collect(str_getcsv($terms, ' ', '"'))->filter()->each(function ($term) use ($query) {
//                $term = $term.'%';
//                $query->where(function (Builder $query) use ($term) {
//                    $query->where('login', 'ilike', $term)
//                        ->orWhereIn('company_id', Company::query()
//                            ->where('name', 'ilike', $term)
//                            ->pluck('id')
//                        )
//                        ->orWhereHas('profile', function (Builder $query) use ($term) {
//                            $query->where('first_name', 'ilike', $term)
//                                ->orWhere('last_name', 'ilike', $term);
//                        })
//                    ;
//                });
//            });
//        }
//    }
}
