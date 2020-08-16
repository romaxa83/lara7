<?php

namespace App\Console\Commands;

use App\Models\User\Profile;
use App\Models\User\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateCubicUser extends Command
{
    protected $signature = 'admin:cubic-user';

    protected $description = 'Create test cubic user';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    protected $email = 'cubic@rubic.com';

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        if(User::where('email', $this->email)->count()){
            $this->warn('Cubic is exists');
            return;
        }
        $user = new User();
        $user->login = 'cubic';
        $user->password = Hash::make('password');
        $user->email = $this->email;
        $user->save();

        $profile = new Profile();
        $profile->first_name = 'Cubic';
        $profile->last_name = 'Rubic';

        $user->profile()->save($profile);

        $this->info('Cubic created.');
    }
}
