<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
	return [
		'zoo_id' => 1,
		'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'role' => $faker->jobTitle
	];
});
