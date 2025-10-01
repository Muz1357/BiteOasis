<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Route::middleware('auth:sanctum')->get('/me', 
function (Request $request){
    return $request->user();
});

Route::middleware('auth:sanctum')->get('/profile',
function(Request $request){
    return response()->json([
        'user' => $request->user()
    ]);
});

//Login Token 
Route::post('token/login', function(Request $request){
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (!Auth::attempt($credentials)){
        return response()->json(['message' => 'Invalid login credentials'], 422);
    }

    $user = Auth::user();

    //Issue a token with full access (*)
    $token = $user->createToken('api-token', ['*'])->plainTextToken;
    return ['token' => $token];
});

//Logout token
Route::middleware('auth:sanctum')->post('/token/logout',
function (Request $request){
    $request->user()->currentAccessToken()->delete();
    return response()->json([
        'message' => 'Logged out successfully'
    ]);
})->name('token.logout');

//Role based access to for admin
Route::middleware('auth:sanctum')->get('/admin-dashboard',
function (Request $request){
    $user = $request->user();
    if ($user->role !=='admin'){
        return response()->json(['message' => 'Forbidden'], 403);
    }
    return ['message'=> 'Welcome admin!'];
})->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');