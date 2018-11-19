<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Subscription;


class FishBox extends Model
{
	use SoftDeletes;
	
  //Fishbox->subscription
  public function subscription(){
      return $this->hasMany(Subscription::class);
  }

  protected $dates = ['deleted_at'];
}
