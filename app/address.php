<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Subscription;

class Address extends Model
{
	use SoftDeletes;

  //Address->user
  public function user(){
      return $this->belongsTo(User::class);
  }

  //Address->Subscription
  public function subscription(){
    return $this->belongsTo(Subscription::class);
  }

  protected $dates = ['deleted_at'];
}
