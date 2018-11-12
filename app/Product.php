<?php

namespace App;

use SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\ProductImage;
use App\SubscriptionDetail;

class Product extends Model
{
  //Products->category
  public function category(){
    return $this->belongsTo(Category::class);
  }

  //Products->images
  public function images(){
    return $this->hasMany(ProductImage::class);
  }

  //Product->subscriptionDetail
	public function subscriptionDetail()
	{
		return $this->hasMany(SubscriptionDetail::class);
	}
}
