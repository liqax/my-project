<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');
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



// หน้า login
Route::get('/login', function () {
    return view('auth.login'); // ให้คุณสร้างไฟล์ resources/views/auth/login.blade.php ด้วย
})->name('login');

// หน้า register
Route::get('/register', function () {
    return view('auth.register'); // สร้าง views เหมือนกัน
})->name('register');

// logout
Route::post('/logout', function () {
    auth()->logout();
    return redirect('/');
})->name('logout');

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->name('password.email');



Route::view('/about', 'about')->name('about');