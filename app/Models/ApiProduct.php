<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent; 

class ApiProduct extends Eloquent
{
    protected $connection = 'ProductFinderDB';
    protected $collection = 'api_products';

    protected $fillable = ['name', 'description', 'price', 'category', 'image'];

}
