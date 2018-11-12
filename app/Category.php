<?php

namespace App;

use SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\Product;

class Category extends Model
{
  // category->Products
	public function products(){
		return $this->hasMany(Product::Class);
	}
}
