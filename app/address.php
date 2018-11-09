<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use SoftDeletes;

class Address extends Model
{

  //Address->user
    public function user(){
        return $this->hasOne(User::class);
    }
}
