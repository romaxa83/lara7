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

        $users = User::query()
            ->withLastLoginAt()
            ->withLastLoginIpAddress()
            ->with(['profile:user_id,last_name,first_name'])
            ->notAdmin()
            ->get();

        return view('admin.user.index', compact('title', 'users'));
    }
}
