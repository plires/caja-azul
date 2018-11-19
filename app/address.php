<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Address extends Model
{
	use SoftDeletes;

  //Address->user
  public function user(){
      return $this->belongsTo(User::class);
  }

  protected $dates = ['deleted_at'];
}
