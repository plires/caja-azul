<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use App\Address;
use App\Subscription;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //User->address
    public function address(){
        return $this->hasMany(Address::class);
    }

    //User->subscriptions
    public function subscriptions(){
        return $this->hasMany(Subscription::class);
    }

    protected $dates = ['deleted_at'];

}
