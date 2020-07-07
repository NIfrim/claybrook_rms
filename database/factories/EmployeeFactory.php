<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Employee;
use Faker\Generator as Faker;
	use Illuminate\Support\Facades\Hash;
	
$factory->define(Employee::class, function (Faker $faker) {
	
	$accountId = \App\Models\AccountType::all()->where('name', '=', 'Admin')->first();

	return [
		'zoo_id' => 1,
		'account_type_id' => $accountId->id,
		'email' => 'admin@claybrook.com',
		'password' => Hash::make('password'),
		'title' => 'Mr.',
		'first_name' => 'Georgia',
		'last_name' => 'Rodgers',
		'job_title' => 'System Administrator'
	];
});
