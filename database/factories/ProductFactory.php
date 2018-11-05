<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
    	'name'				=> $faker->word,
			'description'	=> $faker->text,
			'category_id'	=> $faker->numberBetween(1, 2)
    ];
});
