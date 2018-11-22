<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\DiscountCode;

class DiscountCodesController extends Controller
{
  public function Index()
  {
  	$discountsCodes = DiscountCode::paginate(5);

  	return view('admin.discount_codes.index')->with(compact('discountsCodes'));
  }
}
