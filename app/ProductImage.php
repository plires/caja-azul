<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Product;

class ProductImage extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	
  //Images->product
	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	// accesor
  public function getUrlAttribute(){

  	if (substr($this->image, 0, 4) === 'http') {
  		return $this->image;
  	}

  	return asset('/storage/images/products/' . $this->product_id .'/'. $this->image);
  	// return '/storage/images/products/' . $this->image;
  }

}