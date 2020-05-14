<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AccountType;
use Faker\Generator as Faker;

$factory->define(AccountType::class, function (Faker $faker) {
    return [
        'id' => 'Admin',
		'permissions' => [
			'animals' => ['READ', 'WRITE'],
			'locations' => ['READ', 'WRITE'],
			'accounts' => ['READ', 'WRITE'],
			'reviews' => ['READ', 'WRITE'],
			'sponsors' => ['READ', 'WRITE'],
			'users' => ['READ', 'WRITE'],
			'eventsAndNews' => ['READ', 'WRITE']
		]
    ];
});
