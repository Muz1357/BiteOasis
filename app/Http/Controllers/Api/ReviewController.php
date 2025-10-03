<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * List reviews (optional filters by product_id or user_id)
     */
    public function index(Request $request)
    {
        $query = Review::query();

        if ($request->filled('product_id')) {
            $query->where('product_id', $request->product_id);
        }

        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        return response()->json($query->paginate(12));
    }

    /**
     * Store a new review
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|string',
            'user_id'    => 'required|string',
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'nullable|string',
            'meta'       => 'nullable|array',
        ]);

        $review = Review::create([
            ...$data,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json($review, 201);
    }

    /**
     * Show a single review
     */
    public function show(string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        return response()->json($review);
    }

    /**
     * Update an existing review
     */
    public function update(Request $request, string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $data = $request->validate([
            'rating'  => 'nullable|integer|min:1|max:5',
            'comment' => 'nullable|string',
            'meta'    => 'nullable|array',
        ]);

        $review->update([
            ...$data,
            'updated_at' => now(),
        ]);

        return response()->json($review);
    }

    /**
     * Delete a review
     */
    public function destroy(string $id)
    {
        $review = Review::find($id);

        if (!$review) {
            return response()->json(['message' => 'Review not found'], 404);
        }

        $review->delete();

        return response()->json(['message' => 'Review deleted successfully'], 204);
    }

    /**
     * Get average rating and count for a product (MongoDB aggregation)
     */
    public function statsByProduct(string $productId)
    {
        $collection = DB::connection('mongodb')->getCollection('reviews');

        $cursor = $collection->aggregate([
            ['$match' => ['product_id' => $productId]],
            [
                '$group' => [
                    '_id'           => '$product_id',
                    'averageRating' => ['$avg' => '$rating'],
                    'count'         => ['$sum' => 1],
                ]
            ],
        ]);

        $result = iterator_to_array($cursor);

        return response()->json($result ?: []);
    }
}
