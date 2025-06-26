<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ShippingAddressController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\ExamBookingController;



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

Route::middleware(['auth'])->group(function () {
    Route::get('/account', [AccountController::class, 'showAccountPage'])->name('account.page');
    Route::get('/account/address/edit', [AccountController::class, 'editAddress'])->name('address.edit');
});


Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/forgot-password', function (Request $request) { 
    $request->validate(['email' => 'required|email']);
    // ส่งอีเมลรีเซ็ตรหัสผ่าน
    $status = Password::sendResetLink($request->only('email'));
    // ตรวจสอบสถานะและส่งกลับไปพร้อมข้อความ
    if ($status === Password::RESET_LINK_SENT) {
        return back()->with(['status' => __($status)]);
    }
    return back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');
Route::post('/logout', function () {Auth::logout(); return redirect('/'); })->name('logout');


Route::get('/shipping', [ShippingAddressController::class, 'create'])->name('shipping.create');
Route::post('/shipping/save', [ShippingAddressController::class, 'store'])->name('shipping.save');
Route::get('/customer/address', [CustomerController::class, 'address'])->name('customer.address');
Route::post('/customer/address/save', [CustomerController::class, 'saveAddress'])->name('customer.address.save');





Route::get('/admin/export-bookings', [ExamBookingController::class, 'exportBookings'])->name('admin.bookings.export');
// Route to display the form
Route::get('/book-exam', [ExamBookingController::class, 'showBookingForm'])->name('exam.booking.form');

// Route to handle form submission
Route::post('/book-exam', [ExamBookingController::class, 'submitBookingForm'])->name('exam.booking.submit');

// Optional: Routes for Terms and Privacy pages (if they exist)
Route::get('/terms', function () {
    return view('terms'); // Create a resources/views/terms.blade.php file
})->name('terms');

Route::get('/privacy', function () {
    return view('privacy'); // Create a resources/views/privacy.blade.php file
})->name('privacy');