<?php

namespace App;

use SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\subscriptionDetail;

class DiscountCode extends Model
{
	//DiscountCode->subscriptionDetail
	public function subscriptionDetail()
	{
		return $this->hasMany(subscriptionDetail::class);
	}
}
