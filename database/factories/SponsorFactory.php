<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsor;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {
    return [
    	'zoo_id' => 1,
    	'first_name' => $faker->firstName,
		'last_name' => $faker->lastName,
		'title' => $faker->title,
		'job' => $faker->jobTitle,
		'email' => $faker->unique()->safeEmail,
		'password' => bcrypt('test'),
		'primary_contact_number' => $faker->unique()->e164PhoneNumber,
		'address' => [
			'home' => [
				'building_number' => $faker->buildingNumber,
				'road_name' => $faker->streetName,
				'city' => $faker->city,
				'county' => $faker->state,
				'postcode' => $faker->postcode
			]
		]
    ];
});
