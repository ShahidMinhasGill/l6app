<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Role::class, function (Faker $faker) {
    return [
        'name' => str::random(5),
        
    ];
});
