<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User\Login;
use App\Models\User\User;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Users';

        // подсчитываем статусы
        if (config('database.default') === 'mysql' || config('database.default') === 'sqlite') {
            $statuses = User::toBase()
                ->selectRaw("count(case when status = '0' then 1 end) as count_draw")
                ->selectRaw("count(case when status = '1' then 1 end) as count_active")
                ->selectRaw("count(case when status = '2' then 1 end) as count_ban")
                ->first();
        }

        if (config('database.default') === 'pgsql') {
            $statuses = User::toBase()
                ->selectRaw("count(*) filter (where status = '0') as count_draw")
                ->selectRaw("count(*) filter (where status = '1') as count_active")
                ->selectRaw("count(*) filter (where status = '2') as count_ban")
                ->first();
        }

        $users = User::query()
            ->orderLastLogin()
            ->withLastLoginAt()
            ->withLastLoginIpAddress()
            ->with(['profile:user_id,last_name,first_name', 'company'])
            ->search(request('search'))
            ->notAdmin()
            ->paginate();

        return view('admin.user.index', compact('title', 'users', 'statuses'));
    }
}
