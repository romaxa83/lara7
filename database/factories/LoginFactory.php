<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User\Login;
use Faker\Generator as Faker;
use Illuminate\Support\Carbon;

$factory->define(Login::class, function (Faker $faker) {
    $randomDate = $randomDate = Carbon::now()->subDays(rand(0, 30));
    return [
        'ip_address' => $faker->ipv4,
        'created_at' => $randomDate,
    ];
});
