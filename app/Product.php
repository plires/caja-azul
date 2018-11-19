<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Category;
use App\ProductImage;
use App\SubscriptionDetail;

class Product extends Model
{
  use SoftDeletes;
  protected $dates = ['deleted_at'];
  
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

  public function getFeaturedImageUrlAttribute()
  {

    $featuredImage = $this->images()->where('featured', 1)->first();

    if(!$featuredImage)
      $featuredImage = $this->images()->first();

    if($featuredImage){
      return $featuredImage->url;
    }
    //default
    return '/images/products/no-image.gif';

  }

}
