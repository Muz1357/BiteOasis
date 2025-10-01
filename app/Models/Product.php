<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    // A product can appear in many cart items
    public function carts(){
        return $this->hasMany(Cart::class);
    }

    // A product can belong to many order items
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }

    // A product can have multiple offers
    public function offers(){
        return $this->hasMany(Offers::class);
    }
}
