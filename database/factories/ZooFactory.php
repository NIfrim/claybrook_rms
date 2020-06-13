<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Zoo;
use Faker\Generator as Faker;

$factory->define(Zoo::class, function (Faker $faker) {
    return [
    	'id' => 1,
		'company_number' => '12334298N3',
        'name' => 'Claybrook Zoo',
		'map_image' => 'main-map.bmp',
		'address' => [
			'building_number' => '46',
			'road_name' => 'Zoo Lane',
			'city' => 'Eastlands',
			'county' => 'North Yorkshire',
			'postcode' => 'YR12 3TH'
		],
		'contact_details' => [
			'customer relations' => [
				'phone' => '01604 552 123',
				'email' => 'customers@claybrook.co.uk'
			]
		],
		'opening_times' => [
			"weekend" => ["opens" => "12:00", "closes" => "18:00"],
			"weekdays" => ["opens" => "10:00", "closes" => "20:00"]
		],
		'history' => 'Some information regarding the history of the Zoo. Edited',
    ];
});
