<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'user';
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles(){
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id');
    }

    public function basket() {
        return $this->belongsToMany('App\Item', 'basket_user_item', 'user_id', 'item_id');
    }

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
