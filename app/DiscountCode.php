<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\subscriptionDetail;

class DiscountCode extends Model
{
	use SoftDeletes;
	
	//DiscountCode->subscriptionDetail
	public function subscriptionDetail()
	{
		return $this->hasMany(subscriptionDetail::class);
	}

	protected $dates = ['deleted_at'];
}
