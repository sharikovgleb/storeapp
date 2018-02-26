<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    public function items(){
        return $this->belongsToMany('App\Item', 'item_order', 'order_id', 'item_id');        
    }

    public function user() {
        return $this->hasOne('App\User');
    }
}
