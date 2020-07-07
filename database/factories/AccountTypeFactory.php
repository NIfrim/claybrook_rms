<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\AccountType;
use Faker\Generator as Faker;

$factory->define(AccountType::class, function (Faker $faker) {
    return [
        'name' => 'Admin',
		'permissions' => [
			"animals" => ["READ", "WRITE"],
			"reviews" => ["READ", "WRITE"],
			"sponsors" => ["READ", "WRITE"],
			"employees" => ["READ", "WRITE"],
			"locations" => ["READ", "WRITE"],
			"attractions" => ["READ", "WRITE"],
			"eventsAndNews" => ["READ", "WRITE"],
			"ticketsAndPasses" => ["READ", "WRITE"]
		]
    ];
});
