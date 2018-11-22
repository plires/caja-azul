<?php

use Illuminate\Database\Seeder;
use App\Address;

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
			Address::create([
        'user_id'				=>	1,
	    	'street'				=>	\Faker\Factory::create()->streetName(),
				'number'				=>	\Faker\Factory::create()->buildingNumber(),
				'departament'		=>	\Faker\Factory::create()->city(),
				'floor'					=>	\Faker\Factory::create()->city(),
				'locality'			=>	\Faker\Factory::create()->state(),
				'cp'						=>	\Faker\Factory::create()->postcode(),
				'state'					=>	\Faker\Factory::create()->state(),
				'country'				=>	\Faker\Factory::create()->country()
      ]);

      Address::create([
        'user_id'				=>	1,
	    	'street'				=>	\Faker\Factory::create()->streetName(),
				'number'				=>	\Faker\Factory::create()->buildingNumber(),
				'departament'		=>	\Faker\Factory::create()->city(),
				'floor'					=>	\Faker\Factory::create()->city(),
				'locality'			=>	\Faker\Factory::create()->state(),
				'cp'						=>	\Faker\Factory::create()->postcode(),
				'state'					=>	\Faker\Factory::create()->state(),
				'country'				=>	\Faker\Factory::create()->country()
      ]);
    }
}
