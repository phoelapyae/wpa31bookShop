<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['cityname'];

    public function orders(){
        return $this->hasMany('App\Order');
    }
}
