<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['user_id', 'status'];

    public function items(){
        return $this->belongsToMany('App\Item', 'item_order', 'order_id', 'item_id')->withPivot('quantity');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
