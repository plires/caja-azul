<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Role extends Model
{

	// Role->users
  function users()
  {
  	return $this->hasMany(User::class);
  }

}
