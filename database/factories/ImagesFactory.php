<?php

use Faker\Generator as Faker;
use App\Images;

$factory->define(Images::class, function (Faker $faker) {
    return [
			'image' => $faker->imageUrl(300, 300),
			'product_id' => $faker->numberBetween(1, 20)
    ];
});