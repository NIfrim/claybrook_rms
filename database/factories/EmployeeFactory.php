<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;
	use Illuminate\Support\Facades\Hash;
	
	$factory->define(Employee::class, function (Faker $faker) {
	return [
		'zoo_id' => 1,
		'account_type_id' => 'Admin',
		'email' => $faker->unique()->safeEmail,
		'password' => Hash::make('password'),
		'title' => $faker->title,
		'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'job_title' => $faker->jobTitle
	];
});
