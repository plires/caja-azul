<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
	use SoftDeletes;
	
  // category->Products
	public function products(){
		return $this->hasMany(Product::Class);
	}

	protected $dates = ['deleted_at'];
}
