<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaymentDetails;
use Faker\Generator as Faker;

$factory->define(PaymentDetails::class, function (Faker $faker) {
    return [
        'type' => 'bank_account',
		'bank' => $faker->company,
		'sort_code' => '123456',
		'account_number' => $faker->bankAccountNumber
    ];
});
