<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
	$sponsorId = \App\Models\Sponsor::all()->random(1)->first()->id;
	
	return [
		'zoo_id' => 1,
		'sponsor_id' => $sponsorId,
		'posted_by' => 'sponsor',
		'title' => $faker->title,
		'review' => $faker->realText(),
		'reaction' => $faker->randomElement([0, 1]),
		'posted' => $faker->dateTimeThisDecade,
	];
});
