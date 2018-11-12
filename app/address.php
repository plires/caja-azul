<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;
use App\User;

class Address extends Model
{

  //Address->user
  public function user(){
      return $this->belongsTo(User::class);
  }
}
