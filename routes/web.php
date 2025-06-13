<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;


Route::get('/', function () {
 return view('home');
});

Route::get('/products',  [ShopController::class,'index'])->name('shop.index');
Route::get('/products/{id}', [ShopController::class,'show']) ->name('shop.show');


//History
Route::get('/orders/history', [OrderController::class, 'history'])
  ->name('orders.history');

Route::get('/orders/sale', function () {
    return view('orders.sale');
});

//billing 
Route::get('/billing/account', function () {
    return view('billing.account');
});
//Customer Account
Route::get('/customer/account', function () {
    return view('customer.account');
});
Route::get('/customer/address', function () { 
    return view('customer.address');
});
Route::get('/customer/gdpr', function () { 
    return view('customer.gdpr');
});

// Wishlist
Route::get('/wishlist', [ShopController::class, 'viewWishlist'])->name('wishlist.view');
Route::post('/wishlist/add', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [ShopController::class, 'removeFromWishlist'])->name('wishlist.remove');



// Cart
Route::get('/cart', [ShopController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [ShopController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [ShopController::class, 'removeFromCart'])->name('cart.remove');



//checkout 
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.page');
// ส่งข้อมูลการชำระเงิน
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');






Route::view('/about', 'about')->name('about');
