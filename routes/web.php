<?php
use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\ProductController as UserProductController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\OrderController as UserOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ApiProductController;
use App\Http\Controllers\OfferController;

use Illuminate\Support\Facades\DB;

use App\Models\Offer;

// Public routes
Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', function(){
    return view('homepage');
});

Route::get('/products', [UserProductController::class, 'showPro'])->name('products.show');

//Logged in user routes
Route::middleware(['auth'])->group(function (){
    Route::get('dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Cart
    Route::get('/cart', [CartController::class, 'displayC'])->name('displayC');
    Route::post('/cart/add/{productId}', [CartController::class, 'addC'])->name('cart.addC');
    Route::post('/cart/update/{id}', [CartController::class, 'updateC'])->name('cart.updateC');
    Route::delete('cart/remove/{id}', [CartController::class, 'removeC'])->name('cart.removeC');

    //Orders and checkout
    Route::get('/checkout', [UserOrderController::class, 'checkout'])->name('orders.checkout');
    Route::post('/checkout', [UserOrderController::class, 'placeOrder'])->name('orders.place');
    Route::get('/orders', [UserOrderController::class, 'displayO'])->name('orders.displayO');
});

// Admin routes
Route::middleware(['auth', 'can:access-admin-dashboard'])
    ->prefix('admin')
    ->group(function () {

    // Products
    Route::get('/products', [AdminProductController::class, 'showP'])->middleware('can:manage-products')->name('admin.products.showP');
    Route::get('/products/create', [AdminProductController::class, 'create'])->middleware('can:manage-products')->name('admin.products.create');
    Route::post('/products', [AdminProductController::class, 'store'])->middleware('can:manage-products')->name('admin.products.store');
    Route::get('/products/{id}/edit', [AdminProductController::class, 'edit'])->middleware('can:manage-products')->name('admin.products.edit');
    Route::put('/products/{id}', [AdminProductController::class, 'update'])->middleware('can:manage-products')->name('admin.products.update');
    Route::delete('/products/{id}', [AdminProductController::class, 'destroy'])->middleware('can:manage-products')->name('admin.products.destroy');

    // Users
    Route::get('/users', [UserController::class, 'showU'])->middleware('can:manage-users')->name('admin.users.showU');
    Route::get('/users/create', [UserController::class, 'createU'])->middleware('can:manage-users')->name('admin.users.createU');
    Route::post('/users', [UserController::class, 'store'])->middleware('can:manage-users')->name('admin.users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'editU'])->middleware('can:manage-users')->name('admin.users.editU');
    Route::put('/users/{id}', [UserController::class, 'update'])->middleware('can:manage-users')->name('admin.users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->middleware('can:manage-users')->name('admin.users.destroy');

    // Orders
    Route::get('/orders', [AdminOrderController::class, 'showO'])->middleware('can:manage-orders')->name('admin.orders.showO');
    Route::get('/orders/{id}', [AdminOrderController::class, 'show'])->middleware('can:manage-orders')->name('admin.orders.show');
    Route::put('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->middleware('can:manage-orders')->name('admin.orders.updateStatus');
    Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->middleware('can:manage-orders')->name('admin.orders.destroy');
});

Route::post('/logout', function(Request $request) {
    $user = $request->user();

    //If user has an API token, delete it
    if ($user && $user->currentAccessToken()){
        $user->currentAccessToken()->delete();
    }

    auth()->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::get('/offers', function(){
    $offers = Offer::with('product')->get();
    return view('special-offers', compact('offers'));
});

// About Us Page
Route::view('/about', 'about-us');

require __DIR__.'/auth.php';