<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = ['shopname'];

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
