<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['title','price','review','author_id','category_id','publisher_id','page'];

    public function authors(){
        return $this->belongsTo('App\Author');
    }

    public function categories(){
        return $this->belongsTo('App\Category');
    }

    public function publishers(){
        return $this->belongsTo('App\Publisher');
    }

    public function orders(){
        return $this->belongsToMany(Order::class,'books_orders');
    }
}
