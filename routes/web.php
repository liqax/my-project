<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
 return view('home');
});
Route::get('/', function () {
    // กำหนดหมวดหมู่เป็น array ส่งไปให้ view
    $categories = [
        ['label' => 'อุปกรณ์วิทยาศาสตร์', 'icon' => 'science.png'],
        ['label' => 'สารเคมี',            'icon' => 'chemistry.png'],
        ['label' => 'หนังสือ',             'icon' => 'books.png'],
        ['label' => 'โดรน',               'icon' => 'drone.png'],
    ];
    return view('home', compact('categories'));
});
Route::get('/', function () {
    // เตรียมหมวดหมู่สินค้า
    $categories = [
  ['slug'=>'science','label'=>'อุปกรณ์วิทยาศาสตร์','icon'=>'science.png'],
  ['slug'=>'chemistry','label'=>'สารเคมี','icon'=>'chemistry.png'],
  ['slug'=>'books','label'=>'หนังสือ','icon'=>'books.png'],
  ['slug'=>'drone','label'=>'โดรน','icon'=>'drone.png'],
];
    // เตรียมหนังสือ (ถ้ายังไม่มี)
    $books = [
        ['img'=>'book1.jpg','title'=>'หนังสือวิทยาศาสตร์ ม.3'],
        ['img'=>'book2.jpg','title'=>'หนังสือกุญชาญาณ เพื่อส่งเสริมอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก'],
         ['img'=>'book3.jpg','title'=>'หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย'],
          ['img'=>'book4.jpg','title'=>'หนังสือภาษาอังกฤษพื้นฐาน'],
        ['img'=>'book5.jpg','title'=>'นิยายสืบสวนสุดเร้าใจ'],
        ['img'=>'book6.jpg','title'=>'ตำราคณิตศาสตร์ขั้นสูง'],
    ];
    return view('home', compact('categories','books'));
});

Route::post('/wishlist/add/{book}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::post('/wishlist/add/{book}', [WishlistController::class, 'add'])
     ->name('wishlist.add');

Route::get('/products', function () {
    return view('products');
});





Route::get('/science-tools', function () {
    return 'อุปกรณ์วิทยาศาสตร์';
});

Route::get('/books', function () {
    return 'หนังสือ';
});

Route::get('/chemicals', function () {
    return 'สารเคมี';
});

Route::get('/drones', function () {
    return 'โดรน';
});

Route::get('/orders', function () {
    return 'ประวัติคำสั่งซื้อ';
});

Route::get('/more', function () {
    return 'เพิ่มเติม';
});




