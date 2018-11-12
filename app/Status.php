<?php

namespace App;

use SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Subscription;

class Status extends Model
{
  // Status->subscription
	public function subscriptions(){
		return $this->hasMany(Subscription::Class);
	}
}
