<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
 return view('home');
});

Route::get('/products',  [ShopController::class,'index'])->name('shop.index');
Route::get('/products/{id}', [ShopController::class,'show']) ->name('shop.show');
Route::get('/cart', [ShopController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('shop.add');

Route::get('/orders/history', [OrderController::class, 'history'])
     ->name('orders.history');

Route::get('/wishlist', [ShopController::class, 'viewWishlist'])->name('wishlist.view');
Route::post('/wishlist/add', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [ShopController::class, 'removeFromWishlist'])->name('wishlist.remove');

Route::get('/more', function () {
    return 'เพิ่มเติม';
});
Route::view('/about', 'about')->name('about');



