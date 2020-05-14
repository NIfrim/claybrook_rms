<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
	use Illuminate\Support\Facades\Hash;
	
	$factory->define(User::class, function (Faker $faker) {
    return [
    	'zoo_id' => 1,
        'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'email' => $faker->unique()->safeEmail,
		'registered' => $faker->dateTimeThisDecade,
		'password' => Hash::make('password'),
    ];
});
