<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SponsorAgreement;
use Faker\Generator as Faker;

$factory->define(SponsorAgreement::class, function (Faker $faker) {
	$sponsorId = $faker->numberBetween(12, 31);
	
	return [
		'sponsor_id' => $sponsorId,
		'date' => $faker->dateTimeThisDecade,
		'agreement_start' => $faker->dateTimeThisDecade,
		'agreement_end' => $faker->dateTimeThisDecade,
		'signage_area' => 12.5,
		'documents' => [
			'contract' => $sponsorId.'Contract',
		],
		'payment_status' => $faker->randomElement(['PENDING', 'PAID', 'OVERDUE', 'DECLINED']),
	];
});
