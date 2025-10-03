<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    protected $connection = 'mongodb';

    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $collection) {
            $collection->index('product_id');
            $collection->index(['product_id' => 1, 'rating' => -1]);
            $collection->index('user_id');
            $collection->text('comment');
            $collection->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::drop('reviews');
    }
};
