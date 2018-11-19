<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Status;
use App\User;
use App\FishBox;
use App\SubscriptionDetail;

class Subscription extends Model
{
  use SoftDeletes;

  //Subscription->status
  public function status(){
      return $this->belongsTo(Status::class);
  }

  //Subscription->user
  public function user(){
      return $this->belongsTo(User::class);
  }

  //Subscription->fishBox
  public function fishBox(){
      return $this->belongsTo(FishBox::class);
  }

  //Subscription->subscriptionDetail
  public function subscriptionDetail(){
    return $this->hasMany(SubscriptionDetail::class);
  }

  protected $dates = ['deleted_at'];

}
