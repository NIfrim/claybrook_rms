<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\EmployeeAccount;
use Faker\Generator as Faker;

$factory->define(EmployeeAccount::class, function (Faker $faker) {
    return [
        'employee_id' => factory(App\Employee::class)->create([
        	'zoo_id' => 1,
			'first_name' => $faker->firstName,
			'last_name' => $faker->lastName,
			'role' => $faker->jobTitle
		])->id,
		'account_type' => 'ADMIN',
		'username' => $faker->userName,
		'password' => bcrypt('test'),
		'permissions' => [
			'animals' => 'READ/WRITE',
			'locations' => 'READ/WRITE',
			'accounts' => 'READ/WRITE',
			'reviews' => 'READ/WRITE',
			'sponsors' => 'READ/WRITE',
			'eventsAndNews' => 'READ/WRITE'
		]
    ];
});
