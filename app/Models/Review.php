<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent; 

class Review extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection = 'reviews';

    protected $fillable = [
        'product_id',
        'user_id',
        'rating',
        'comment',
        'meta',
        'created_at',
        'updated_at'
    ];

    protected $casts = [
        'meta' => 'array',
        'rating' => 'int',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
