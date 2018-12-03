<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

use App\User;
use App\Address;
use App\Subscription;
use App\SubscriptionDetail;

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
        'role_id'       => 2,
        'password'    => bcrypt('123123'),
      ]);

      $users = factory(User::class, 99)->create();
      $users->each(function($u){
        
        $subscriptions = factory(Subscription::class, 2)->make();
        $u->subscriptions()->saveMany($subscriptions);

        $address = factory(Address::class, 2)->make();
        $u->address()->saveMany($address);

        $subscriptions->each(function($s){
          
          $subscriptionDetails = factory(SubscriptionDetail::class, 3)->make();
          $s->subscriptionDetail()->saveMany($subscriptionDetails);

        });
      });

    }
}

            
