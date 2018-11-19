<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Subscription;

class Status extends Model
{
	use SoftDeletes;
	
  // Status->subscription
	public function subscriptions(){
		return $this->hasMany(Subscription::Class);
	}

	protected $dates = ['deleted_at'];
}
