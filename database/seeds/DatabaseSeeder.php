<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(ProductsTableSeeder::class);
      $this->call(StatusesTableSeeder::class);
      $this->call(FishBoxesTableSeeder::class);
      $this->call(DiscountCodeTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(AddressesTableSeeder::class);
      $this->call(SubscriptionsTableSeeder::class);
      $this->call(SubscriptionDetailsTableSeeder::class);
    }
}