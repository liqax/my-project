<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
 return view('home');
});

Route::get('/products',  [ShopController::class,'index'])->name('shop.index');
Route::get('/products/{id}', [ShopController::class,'show']) ->name('shop.show');
Route::post('/cart/add',     [ShopController::class,'addToCart'])->name('shop.add');
Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');
Route::post('/wishlist/add/{book}', [WishlistController::class, 'add'])->name('wishlist.add');


Route::get('/more', function () {
    return 'เพิ่มเติม';
});




