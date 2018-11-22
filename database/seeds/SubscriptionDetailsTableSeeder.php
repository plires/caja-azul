<?php

use Illuminate\Database\Seeder;
use App\SubscriptionDetail;

class SubscriptionDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
		{
			SubscriptionDetail::create([
        'subscription_id'     => 199,
        'product_id'          => \Faker\Factory::create()->numberBetween(1, 20),
        'quantity'            => \Faker\Factory::create()->numberBetween(1, 2),
        'discount_code_id'    => \Faker\Factory::create()->numberBetween(1, 10)
      ]);

      SubscriptionDetail::create([
        'subscription_id'     => 199,
        'product_id'          => \Faker\Factory::create()->numberBetween(1, 20),
        'quantity'            => \Faker\Factory::create()->numberBetween(1, 2),
        'discount_code_id'    => \Faker\Factory::create()->numberBetween(1, 10)
      ]);

      SubscriptionDetail::create([
        'subscription_id'     => 199,
        'product_id'          => \Faker\Factory::create()->numberBetween(1, 20),
        'quantity'            => \Faker\Factory::create()->numberBetween(1, 2),
        'discount_code_id'    => \Faker\Factory::create()->numberBetween(1, 10)
      ]);

      SubscriptionDetail::create([
        'subscription_id'     => 200,
        'product_id'          => \Faker\Factory::create()->numberBetween(1, 20),
        'quantity'            => \Faker\Factory::create()->numberBetween(1, 2),
        'discount_code_id'    => \Faker\Factory::create()->numberBetween(1, 10)
      ]);

      SubscriptionDetail::create([
        'subscription_id'     => 200,
        'product_id'          => \Faker\Factory::create()->numberBetween(1, 20),
        'quantity'            => \Faker\Factory::create()->numberBetween(1, 2),
        'discount_code_id'    => \Faker\Factory::create()->numberBetween(1, 10)
      ]);

      SubscriptionDetail::create([
        'subscription_id'     => 200,
        'product_id'          => \Faker\Factory::create()->numberBetween(1, 20),
        'quantity'            => \Faker\Factory::create()->numberBetween(1, 2),
        'discount_code_id'    => \Faker\Factory::create()->numberBetween(1, 10)
      ]);
		}
}
