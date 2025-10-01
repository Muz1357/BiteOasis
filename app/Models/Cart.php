<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity'];

    // Cart belongs to a User
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    // Cart belongs to a Product
    public function product(){
        return $this->belongsTo(Product::class);
    }
}
