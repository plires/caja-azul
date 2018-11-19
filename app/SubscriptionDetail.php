<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Product;
use App\Subscription;
use App\DiscountCode;

class SubscriptionDetail extends Model
{
	use SoftDeletes;
	
	//SubscriptionDetail->subscription
  public function subscription(){
    return $this->belongsTo(Subscription::class);
  }
  
	//SubscriptionDetail->products (ver esta relacion si esta funcionando bien)
	public function products()
	{
		return $this->belongsTo(Product::class);
	}

	//SubscriptionDetail->discountCode
	public function discountCode()
	{
		return $this->belongsTo(DiscountCode::class);
	}

	protected $dates = ['deleted_at'];

}
