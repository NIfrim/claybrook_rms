<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Zoo;
use Faker\Generator as Faker;

$factory->define(Zoo::class, function (Faker $faker) {
    return [
    	'id' => 1,
        'name' => 'Claybrook Zoo',
		'address' => [
			'building_number' => $faker->buildingNumber,
			'road_name' => $faker->streetName,
			'city' => $faker->city,
			'county' => $faker->state,
			'postcode' => $faker->postcode
		],
		'contact_details' => [
			'customer_relations' => [
				'phone' => $faker->phoneNumber,
				'email' => $faker->companyEmail
			]
		]
    ];
});
