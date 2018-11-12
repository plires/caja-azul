<?php

namespace App;

use SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Subscription;


class FishBox extends Model
{
  //Fishbox->subscription
  public function subscription(){
      return $this->hasMany(Subscription::class);
  }
}
