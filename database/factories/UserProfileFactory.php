<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserProfile;
use Faker\Generator as Faker;

$factory->define(UserProfile::class, function (Faker $faker) {
    return [
    	'user_id' => random_int(1,3),
        'address' => $faker->sentence(3),
        'photo' => $faker->string(255),
        'phone' => $faker->string(25),
       
    ];
});
