<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
	$userId = \App\Models\User::all()->random(1)->first()->id;
	
    return [
        'zoo_id' => 1,
		'user_id' => $userId,
		'posted_by' => 'user',
		'title' => $faker->title,
		'review' => $faker->realText(),
		'reaction' => $faker->randomElement([0, 1]),
		'posted' => $faker->dateTimeThisDecade,
    ];
});
