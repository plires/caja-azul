<?php

use Faker\Generator as Faker;
use App\SubscriptionDetail;

$factory->define(SubscriptionDetail::class, function (Faker $faker) {
    return [
    	'subscription_id'			=> $faker->numberBetween(1, 50),
			'product_id'					=> $faker->numberBetween(1, 20),
			'quantity'						=> $faker->numberBetween(1, 2),
			'discount_code_id'		=> $faker->numberBetween(1, 10)
    ];
});