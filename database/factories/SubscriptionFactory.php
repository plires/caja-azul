<?php

use Faker\Generator as Faker;
use App\Subscription;
use Carbon\Carbon;

$factory->define(Subscription::class, function (Faker $faker) {

	$date = Carbon::now();

    return [
    	'order_date'				=> Carbon::now(),
			'arrival_date'			=> $date->addMonth(),
			'status_id'					=> $faker->numberBetween(1, 3),
			'discount'					=> $faker->numberBetween(1, 20),
			'user_id'						=> $faker->numberBetween(1, 100),
			'fish_box_id'				=> $faker->numberBetween(1, 3)
    ];
});
