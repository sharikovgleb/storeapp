<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function items(){
        return $this->belongsToMany('App\Item', 'item_order', 'order_id', 'item_id');        
    }

    public function user() {
        return $this->hasOne('App\User');
    }
}
