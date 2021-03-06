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
        'name', 'email', 'password', 'is_active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user', 'user_id', 'role_id')->withTimestamps();
    }

    public function basket()
    {
        return $this->belongsToMany('App\Item', 'basket_user_item', 'user_id', 'item_id')->withPivot('quantity');
    }

    public function setBasketItemQuantity($item_id, $quantity)
    {
        if($quantity > 0)
            $this->basket()->updateExistingPivot($item_id, ['quantity' => $quantity]);
    }

    public function getBasketItemQuantity($item_id)
    {
        return $this->basket->where('id', $item_id)->first()->pivot->quantity;
    }

    public function itemInBasket($item_id){
        if($this->basket->where('id', $item_id)->first())
            return true;
        return false;
    }

    public function orders()
    {
        return $this->hasMany('App\Order');
    }

    // $roleName parameter is the string in ('admin' .. 'moderator')
    public function checkRoles(array $roleName)
    {
        if (count($this->roles()->whereIn('name', $roleName)->get()) > 0)
        {
            return true;
        }
        return false;
    }


}
