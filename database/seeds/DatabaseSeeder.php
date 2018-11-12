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
      $this->call(CategoriesTableSeeder::class);
      $this->call(ProductsTableSeeder::class);
      $this->call(UsersTableSeeder::class);
      $this->call(AddressesTableSeeder::class);
      $this->call(DiscountCodeTableSeeder::class);
      $this->call(ProductImagesTableSeeder::class);
      $this->call(FishBoxesTableSeeder::class);
      $this->call(StatusesTableSeeder::class);
      $this->call(SubscriptionsTableSeeder::class);
      $this->call(SubscriptionDetailsTableSeeder::class);
    }
}