<?php

use Faker\Generator as Faker;
use App\DiscountCode;
use Carbon\Carbon;

$factory->define(DiscountCode::class, function (Faker $faker) {
	
	$startDate = Carbon::now();
	  
    return [
    	'name'						=> strtoupper($faker->word),
			'description'			=> $faker->text,
			'start_date'			=> Carbon::now(),
			'end_date'				=> $startDate->addMonth(),
			'discount'				=> $faker->numberBetween(10, 20)
    ];
});