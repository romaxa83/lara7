<?php

use App\Models\User\Company;
use App\Models\User\Login;
use App\Models\User\Profile;
use App\Models\User\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Company::class, 20)->create()->each(fn ($company) => $company->users()
            ->saveMany(factory(User::class, 10)->create()->each(function($user) {
                $user->profile()->save(factory(Profile::class)->make());
                $user->logins()->saveMany(factory(Login::class, random_int(1, 5))->make());
            }))
        );


//        factory(User::class, 50)->create()->each(function ($user) {
//            $user->profile()->save(factory(Profile::class)->make());
//            $user->logins()->saveMany(factory(Login::class, random_int(1, 5))->make());
//        });
    }
}
