<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItem;
use App\Models\Product;

class Order extends Model
{
    protected $fillable = ['user_id', 'total_amount', 'status'];

    // Order belongs to a User
    public function user(){
        return $this->belongsTo(User::class);
    }

    // Order has many OrderItems
    public function orderItems(){
        return $this->hasMany(OrderItem::class);
    }
}
