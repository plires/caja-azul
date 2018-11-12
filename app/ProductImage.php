<?php

namespace App;

use SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Product;

class ProductImage extends Model
{
  //Images->product
	public function product()
	{
		return $this->belongsTo(Product::class);
	}
}