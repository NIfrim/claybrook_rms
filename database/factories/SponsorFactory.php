<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Sponsor;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
	
	$factory->define(Sponsor::class, function (Faker $faker) {
    return [
    	'zoo_id' => 1,
		'title' => 'Dr.',
		'first_name' => 'Trey',
		'last_name' => 'Haliman',
		'job_title' => 'Medical Doctor',
		'email' => 'trey@email.com',
		'password' => Hash::make('password'),
		'building' => $faker->buildingNumber,
		'road' => $faker->streetName,
		'city' => $faker->city,
		'postcode' => $faker->postcode,
    ];
});
