<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    public function products() {
    	return $this->belongsToMany(Products::class,'orders_has_products','order_id','product_id')->withTimestamps();
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }

    public function delivery() {
    	return $this->belongsTo(DeliveryMethods::class,'id');
    }
}
