<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\CustomerController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products',  [ShopController::class,'index'])->name('shop.index');
Route::get('/products/{id}', [ShopController::class,'show']) ->name('shop.show');
Route::view('/about', 'about')->name('about');
Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
Route::get('/orders/sale', function () {return view('orders.sale');});
Route::get('/billing/account', function () {return view('billing.account');});
Route::get('/customer/account', function () {return view('customer.account');});
Route::get('/customer/address', function () { return view('customer.address');});
Route::get('/customer/gdpr', function () { return view('customer.gdpr');});
Route::get('/wishlist', [ShopController::class, 'viewWishlist'])->name('wishlist.view');
Route::post('/wishlist/add', [ShopController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [ShopController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/cart', [ShopController::class, 'viewCart'])->name('cart.view');
Route::post('/cart/add', [ShopController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/update', [ShopController::class, 'updateCart'])->name('cart.update');
Route::post('/cart/remove', [ShopController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/checkout', [CheckoutController::class, 'show'])->name('checkout.page');
Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process'); 
Route::get('/dashboard', function () {return view('dashboard');})->middleware(['auth', 'verified']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/forgot-password', function (Request $request) {$request->validate(['email' => 'required|email']);
 $status = Password::sendResetLink($request->only('email')
    );
    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');
Route::post('/logout', function () {Auth::logout(); return redirect('/'); })->name('logout');

Route::middleware('auth')->group(function () {
Route::get('/checkout', [App\Http\Controllers\OrderController::class, 'showCheckoutPage'])->name('checkout.page');
Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'submitOrder'])->name('checkout.submit');
Route::get('/order-status', [App\Http\Controllers\OrderController::class, 'orderStatus'])->name('order.status');
});
Route::get('/shipping', [ShippingAddressController::class, 'create'])->name('shipping.create');
Route::post('/shipping/save', [ShippingAddressController::class, 'store'])->name('shipping.save');
Route::get('/best-sellers', [ProductController::class, 'bestSellers']);


Route::get('/customer/address', [CustomerController::class, 'address'])->name('customer.address');
Route::post('/customer/address/save', [CustomerController::class, 'saveAddress'])->name('customer.address.save');
