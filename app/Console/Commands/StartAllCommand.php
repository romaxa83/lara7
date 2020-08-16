<?php

namespace App\Console\Commands;

use App\Models\User\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class StartAllCommand extends Command
{
    protected $signature = 'admin:start';

    protected $description = 'Launch all command';

    public function handle()
    {
        $this->call('admin:create');
        $this->call('admin:cubic-user');
    }
}
