<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      User::create([
        'name'        => 'Pablo',
        'last_name'   => 'Lires',
        'phone'       => '1150497501',
        'email'       => 'pablo@librecomunicacion.net',
        'type'       => 'Administrador',
        'password'    => bcrypt('123123'),
        'address_id'  => '1'
      ]);

      factory(User::class, 100)->create();
    }
}