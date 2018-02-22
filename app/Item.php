<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function category(){
        return $this->hasOne('App\Category');
    }

    public function orders(){
        return $this->belongsToMany('App\Order', 'item_order', 'item_id', 'order_id');        
    }
}
