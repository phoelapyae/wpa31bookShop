<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['city_id','shop_id','bookId','number','customer','phone','address'];

    public function books(){
        return $this->belongsToMany(Book::class,'books_orders');
    }

    public function cities(){
        return $this->belongsTo('App\City');
    }

    public function shops(){
        return $this->belongsTo('App\Shop');
    }
}
