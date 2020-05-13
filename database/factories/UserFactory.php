<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    return [
    	'zoo_id' => 1,
        'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'email' => $faker->unique()->safeEmail,
		'registered' => $faker->dateTimeThisDecade,
		'dob' => $faker->dateTimeBetween('-70 years', '-20 years'),
		'password' => bcrypt('test')
    ];
});
