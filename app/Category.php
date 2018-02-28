<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['title','created_by','updated_by'];

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
