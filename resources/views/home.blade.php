@extends('layouts.app')

@section('title', 'PRE-ORDER')

@section('content')



    <!-- Bootstrap Carousel -->
    <div id="mainSlider" class="carousel slide carousel-hover-show" data-bs-ride="carousel">

        <!--  ภาพสไลด์ -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/main-banner.jpg') }}" class="d-block w-100" alt="banner">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/bg2.png') }}" class="d-block w-100 " alt="bg2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/bg3.png') }}" class="d-block w-100" alt="bg3">
            </div>
        </div>

        <!--  ปุ่มเลื่อน -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
            ❮
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
            ❯
        </button>


        <!--จุดดำใต้ภาพ -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="0" class="active" aria-current="true"
                aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#mainSlider" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

    </div>


    <!-- ####################################################################################################### -->





    <div id="productCarousel" class="carousel slide carousel-hover-show mt-1" data-bs-interval="false">

        <!-- INDICATORS -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="1"></button>
        </div>

        <!-- SLIDES -->
        <div class="carousel-inner mt-4">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <div class="d-flex product-slide-row">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/banner-1.jpg') }}" alt="pre order">
                    </div>
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/banner-2.jpg') }}" alt="pre order">
                    </div>
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/bg4.png') }}" alt="pre order">
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="d-flex product-slide-row">
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/bg5.jpg') }}" alt="pre order">
                    </div>
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/banner-2.jpg') }}" alt="pre order">
                    </div>
                    <div class="card shadow-sm">
                        <img src="{{ asset('images/banner-1.jpg') }}" alt="pre order">
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTROLS -->
        <button class="carousel-control-prev btn btn-pink  " type="button" data-bs-target="#productCarousel"
            data-bs-slide="prev">
            ❮
        </button>
        <button class="carousel-control-next btn btn-pink" type="button" data-bs-target="#productCarousel"
            data-bs-slide="next">
            ❯
        </button>
    </div>


    <!-- ##################################################################################################################### -->


    <!-- หมวดหมู่สินค้า -->
    <section class="home-cat py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">เลือกซื้อตามหมวดหมู่สินค้า</h2>

                        <div class="d-flex align-items-center">
                            <a href="/products" class="btn-link text-decoration-none">ดูสินค้าทั้งหมดในหมวดหมู่ →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-pink">❮</button>
                                <button class="swiper-next category-carousel-next btn btn-pink">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">หนังสือ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-bread-baguette.png" alt="Category Thumbnail">
                                <h3 class="category-title">อุปกรณ์วิทยาศาสตร์</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-soft-drinks-bottle.png" alt="Category Thumbnail">
                                <h3 class="category-title">สารเคมี</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-wine-glass-bottle.png" alt="Category Thumbnail">
                                <h3 class="category-title">โดรน</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-animal-products-drumsticks.png" alt="Category Thumbnail">
                                <h3 class="category-title">สินค้าอื่นๆ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-bread-herb-flour.png" alt="Category Thumbnail">
                                <h3 class="category-title">สินค้าอื่นๆ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">สินค้าอื่นๆ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">สินค้าอื่นๆ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">สินค้าอื่นๆ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">สินค้าอื่นๆ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">สินค้าอื่นๆ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">สินค้าอื่นๆ</h3>
                            </a>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section class="py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex flex-wrap flex-wrap justify-content-between mb-5">

                        <h2 class="section-title">สินค้าขายดี!</h2>

                        <div class="d-flex align-items-center">
                            <a href="/products" class="btn-link text-decoration-none">ดูสินค้าทั้งหมดในหมวดหมู่ →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev brand-carousel-prev btn btn-pink">❮</button>
                                <button class="swiper-next brand-carousel-next btn btn-pink">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="brand-carousel swiper">
                        <div class="swiper-wrapper">

                            <div class="swiper-slide">
                                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/images/images/product-thumb-11.jpg" class="img-fluid rounded"
                                                alt="Card title">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body py-0">
                                                <p class="text-muted mb-0">Amber Jar</p>
                                                <h5 class="card-title">Honey best nectar you wish to get</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/images/images/product-thumb-12.jpg" class="img-fluid rounded"
                                                alt="Card title">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body py-0">
                                                <p class="text-muted mb-0">Amber Jar</p>
                                                <h5 class="card-title">Honey best nectar you wish to get</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/images/images/product-thumb-13.jpg" class="img-fluid rounded"
                                                alt="Card title">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body py-0">
                                                <p class="text-muted mb-0">Amber Jar</p>
                                                <h5 class="card-title">Honey best nectar you wish to get</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/images/images/product-thumb-14.jpg" class="img-fluid rounded"
                                                alt="Card title">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body py-0">
                                                <p class="text-muted mb-0">Amber Jar</p>
                                                <h5 class="card-title">Honey best nectar you wish to get</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/images/images/product-thumb-11.jpg" class="img-fluid rounded"
                                                alt="Card title">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body py-0">
                                                <p class="text-muted mb-0">Amber Jar</p>
                                                <h5 class="card-title">Honey best nectar you wish to get</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                    <div class="row g-0">
                                        <div class="col-md-4">
                                            <img src="/images/images/product-thumb-12.jpg" class="img-fluid rounded"
                                                alt="Card title">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="card-body py-0">
                                                <p class="text-muted mb-0">Amber Jar</p>
                                                <h5 class="card-title">Honey best nectar you wish to get</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

   


    
{{--    
   <section class="sale-product py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex flex-wrap justify-content-between mb-5">
                        <h2 class="section-title">สินค้าใหม่!</h2>
                        <div class="d-flex align-items-center">
                            <a href="/products" class="btn-link text-decoration-none">ดูสินค้าทั้งหมด →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev category-carousel-prev btn btn-pink">❮</button>
                                <button class="swiper-next category-carousel-next btn btn-pink">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="category-carousel swiper">
                        <div class="swiper-wrapper">
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-vegetables-broccoli.png" alt="Category Thumbnail">
                                <h3 class="category-title">หนังสือ</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-bread-baguette.png" alt="Category Thumbnail">
                                <h3 class="category-title">อุปกรณ์วิทยาศาสตร์</h3>
                            </a>
                            <a href="index.html" class="nav-link category-item swiper-slide">
                                <img src="/images/images/icon-soft-drinks-bottle.png" alt="Category Thumbnail">
                                <h3 class="category-title">สารเคมี</h3>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}



    <!-- ############################################################################################################# -->


    <section id="bookSection" class="Products-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4 " style="justify-content: space-between;">
                <h2 class="ms-0 section-title">หนังสือ</h2>
                 <a href="/products" class="btn-link text-decoration-none">ดูทั้งหมด →</a>
                <div class="filter-buttons">
                    <button
                        class="btn btn-outline-secondary bookfilter-btn active me-2 mb-2"data-filter='all'>ทั้งหมด</button>
                    <button
                        class="btn btn-outline-secondary bookfilter-btn me-2 mb-2"data-filter='booksci'>หนังสือวิทย์</button>
                    <button class="btn btn-outline-secondary bookfilter-btn mb-2"data-filter='calcu'>หนังสือคณิต</button>
                    <button class="btn btn-outline-secondary bookfilter-btn mb-2"data-filter='kid'>หนังสือนิทาน</button>
                </div>
            </div>

            <!-- Carousel สินค้า 3 ใบ ต่อสไลด์ -->
            <div id="bookCarousel" class="carousel slide" data-bs-interval="false" data-bs-touch="false">

                <div class="carousel-inner overflow-visible">
                    <!-- สไลด์แรก -->
                    <div class="carousel-item active">
                        <div class="row gx-3 gy-4 justify-content-center">

                            @php
                                $books = collect([
                                    1 => [
                                        'img' => 'img/books/book1.jpg',
                                        'title' => "หนังสือวิทยาศาสตร์และเทคโนโลยี\nเล่ม 1 ม.3",
                                        'price' => 110.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'booksci',
                                    ],
                                    2 => [
                                        'img' => 'img/books/book2.jpg',
                                        'title' => " หนังสือกุญชาญาณ เพื่อส่งเสริม\nอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก",
                                        'price' => 140.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'calcu',
                                    ],
                                    3 => [
                                        'img' => 'img/books/book3.jpg',
                                        'title' => ' หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย',
                                        'price' => 180.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'calcu',
                                    ],
                                ]);
                            @endphp
                            @foreach ($books as $id => $book)
                                <div class="col-auto book-item" data-variety="{{ $book['variety'] }}">
                                    <a href="{{ route('shop.show', $id) }}" class="text-decoration-none">
                                        <x-product-card :id="$id" :img="$book['img']" :title="$book['title']"
                                            :price="$book['price']" :variety="$book['variety']" :item-class="$book['class']" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row gx-3 gy-4 justify-content-center" id="bookContainer">

                            @php
                                $books = collect([
                                    4 => [
                                        'img' => 'img/books/book4.jpg',
                                        'title' => 'หนังสือเมฆน้อยสีเทา',
                                        'price' => 100.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'kid',
                                    ],
                                    5 => [
                                        'img' => 'img/books/book5.jpg',
                                        'title' => ' หนังสือเราเป็นเพื่อนที่ต่อกัน',
                                        'price' => 120.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'kid',
                                    ],
                                    6 => [
                                        'img' => 'img/books/book6.jpg',
                                        'title' => ' หนังสือพี่ชายที่แสนดี',
                                        'price' => 110.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'kid',
                                    ],
                                ]);
                            @endphp
                            @foreach ($books as $id => $book)
                                <div class="col-auto book-item" data-variety="{{ $book['variety'] }}">
                                    <a href="{{ route('shop.show', $id) }}" class="text-decoration-none">
                                        <x-product-card :id="$id" :img="$book['img']" :title="$book['title']"
                                            :price="$book['price']" :variety="$book['variety']" :category="$book['category']" :item-class="$book['class']" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- ปุ่มสไลด์ซ้าย -->
                <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">ก่อนหน้า</span>
                </button>

                <!-- ปุ่มสไลด์ขวา -->
                <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">ถัดไป</span>
                </button>

            </div>

        </div>

    </section>





    {{-- ######################################################################################################################### --}}






    <section id="sciSection" class="Products-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4" style="justify-content: space-between;">
                <h2 class="ms-0 section-title">อุปกรณ์วิทยาศาสตร์</h2>
                 <a href="/products" class="btn-link text-decoration-none">ดูทั้งหมด →</a>
                <div class="filter-buttons">
                    <button
                        class="btn btn-outline-secondary scifilter-btn active me-2 mb-2 "data-filter='all'>ทั้งหมด</button>
                    <button
                        class="btn btn-outline-secondary scifilter-btn me-2 mb-2"data-filter='glassware'>เครื่องแก้ว</button>
                    <button class="btn btn-outline-secondary scifilter-btn mb-2"data-filter='testtube'>อื่นๆ</button>
                </div>
            </div>

            <!-- Carousel สินค้า 3 ใบ ต่อสไลด์ -->
            <div id="sciCarousel" class="carousel slide" data-bs-interval="false" data-bs-touch="false">
                <div class="carousel-inner overflow-visible">

                    <!-- สไลด์แรก -->
                    <div class="carousel-item active">
                        <div class="row gx-3 gy-4 justify-content-center"id="sciContainer">
                            @php
                                $science = collect([
                                    7 => [
                                        'img' => 'img/science/1.jpg',
                                        'title' => 'แก้วบีกเกอร์',
                                        'price' => 250.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                    8 => [
                                        'img' => 'img/science/2.jpg',
                                        'title' => ' ขวดทดลอง',
                                        'price' => 100.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                    9 => [
                                        'img' => 'img/science/3.jpg',
                                        'title' => ' หลอดทดลอง',
                                        'price' => 475.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                ]);
                            @endphp
                            @foreach ($science as $id => $sci)
                                <div class="col-auto sci-item"data-variety="{{ $sci['variety'] }} ">
                                    <a href="{{ route('shop.show', $id) }}" class="text-decoration-none">
                                        <x-product-card :id="$id" :img="$sci['img']" :title="$sci['title']"
                                            :price="$sci['price']" :category="$sci['category']" :variety="$sci['variety']" :item-class="$sci['class']" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- สไลด์ถัดไป ( Card  3 ใบ) -->
                    <div class="carousel-item">
                        <div class="row gx-3 gy-4 justify-content-center" id="sciContainer">

                            @php
                                $science = collect([
                                    10 => [
                                        'img' => 'img/science/4.jpg',
                                        'title' => 'ถาดหลุม',
                                        'price' => 50.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'testtube',
                                    ],
                                    11 => [
                                        'img' => 'img/science/5.jpg',
                                        'title' => ' กรวยแก้ว',
                                        'price' => 85.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                    12 => [
                                        'img' => 'img/science/6.jpg',
                                        'title' => 'ถ้วยแก้ว ',
                                        'price' => 70.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                ]);
                            @endphp
                            @foreach ($science as $id => $sci)
                                <div class="col-auto sci-item"data-variety="{{ $sci['variety'] }} ">
                                    <a href="{{ route('shop.show', $id) }}" class="text-decoration-none">
                                        <x-product-card :id="$id" :img="$sci['img']" :title="$sci['title']"
                                            :price="$sci['price']" :category="$sci['category']" :variety="$sci['variety']" :item-class="$sci['class']" />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#sciCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#sciCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>

        </div>
    </section>

    {{-- ####################################################################################################### --}}

    <section id="cheSection" class="Products-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4" style="justify-content: space-between;">
                <h2 class="ms-0 section-title">สารเคมี</h2>
                 <a href="/products" class="btn-link text-decoration-none">ดูทั้งหมด →</a>
                <div class="filter-buttons">
                    <button
                        class="btn btn-outline-secondary chefilter-btn active me-2 mb-2 "data-filter='all'>ทั้งหมด</button>
                    <button
                        class="btn btn-outline-secondary chefilter-btn me-2 mb-2"data-filter='anin'>สารอนินทรีย์</button>
                    <button class="btn btn-outline-secondary chefilter-btn mb-2"data-filter='solut'>สารละลาย</button>
                </div>
            </div>

            <!-- Carousel สินค้า 3 ใบ ต่อสไลด์ -->
            <div id="cheCarousel" class="carousel slide" data-bs-interval="false" data-bs-touch="false">
                <div class="carousel-inner overflow-visible">

                    <!-- สไลด์แรก -->
                    <di class="carousel-item active">
                        <div class="row gx-3 gy-4 justify-content-center"id="cheContainer">

                            @php
                                $chemistry = collect([
                                    13 => [
                                        'img' => 'img/chemistry/1.jpg',
                                        'title' => 'Hydrochloric Acid (HCl)',
                                        'price' => 65.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'all',
                                    ],
                                    14 => [
                                        'img' => 'img/chemistry/2.jpg',
                                        'title' => ' Sodium Hydroxide (NaOH)',
                                        'price' => 80.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'anin',
                                    ],
                                    15 => [
                                        'img' => 'img/chemistry/3.jpg',
                                        'title' => ' sulfuric acid',
                                        'price' => 80.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'anin',
                                    ],
                                ]);
                            @endphp
                            @foreach ($chemistry as $id => $che)
                                <div class="col-auto che-item"data-variety="{{ $che['variety'] }} ">
                                    <a href="{{ route('shop.show', $id) }}" class="text-decoration-none">
                                        <x-product-card :id="$id" :img="$che['img']" :title="$che['title']"
                                            :price="$che['price']" :category="$che['category']" :variety="$che['variety']" :item-class="$che['class']" />
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </di v>

                    <!-- สไลด์ถัดไป (Card 3) -->
                    <div class="carousel-item">
                        <div class="row gx-3 gy-4 justify-content-center"id="cheContainer">

                            @php
                                $chemistry = collect([
                                    16 => [
                                        'img' => 'img/chemistry/4.jpg',
                                        'title' => 'สารละลายเมทิลเรด',
                                        'price' => 75.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'solut',
                                    ],
                                    17 => [
                                        'img' => 'img/chemistry/5.jpg',
                                        'title' => 'สารละลายยูนิเวอร์ซัล',
                                        'price' => 75.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'solut',
                                    ],
                                    18 => [
                                        'img' => 'img/chemistry/6.jpg',
                                        'title' => 'กรดไนตริก เจือจาง 2โมล',
                                        'price' => 85.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'solut',
                                    ],
                                ]);
                            @endphp
                            @foreach ($chemistry as $id => $che)
                                <div class="col-auto che-item"data-variety="{{ $che['variety'] }} ">
                                    <a href="{{ route('shop.show', $id) }}" class="text-decoration-none">
                                        <x-product-card :id="$id" :img="$che['img']" :title="$che['title']"
                                            :price="$che['price']" :category="$che['category']" :variety="$che['variety']" :item-class="$che['class']" />
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#cheCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#cheCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>

    {{-- ####################################################################################################### --}}

    <section id="droneSection" class="Products-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4" style="justify-content: space-between;">
                <h2 class="ms-0 section-title">โดรน</h2>
                 <a href="/products" class="btn-link text-decoration-none">ดูทั้งหมด →</a>
                <div class="filter-buttons">
                    <button
                        class="btn btn-outline-secondary dronefilter-btn active me-2 mb-2 "data-filter='all'>ทั้งหมด</button>
                    <button class="btn btn-outline-secondary dronefilter-btn me-2 mb-2"data-filter='gen1'>GEN1</button>
                    <button class="btn btn-outline-secondary dronefilter-btn mb-2"data-filter='gen2'>GEN2</button>
                </div>
            </div>

            <!-- Carousel สินค้า 3 ใบ ต่อสไลด์ -->
            <div id="droCarousel" class="carousel slide" data-bs-interval="false" data-bs-touch="false">
                <div class="carousel-inner overflow-visible">

                    <!-- สไลด์แรก -->
                    <div class="carousel-item active">
                        <div class="row gx-3 gy-4 justify-content-center" id="droneContainer">
                            @php
                                $drones = collect([
                                    19 => [
                                        'img' => 'img/drone/1.jpg',
                                        'title' => 'โดรน GEN1',
                                        'price' => 10000.0,
                                        'category' => 'drone',
                                        'class' => 'drone-item',
                                        'variety' => 'gen1',
                                    ],
                                    20 => [
                                        'img' => 'img/drone/2.jpg',
                                        'title' => ' โดรน GEN2',
                                        'price' => 12000.0,
                                        'category' => 'drone',
                                        'class' => 'drone-item',
                                        'variety' => 'gen2',
                                    ],
                                    21 => [
                                        'img' => 'img/drone/3.jpg',
                                        'title' => ' โดรน GEN2 LT',
                                        'price' => 15000.0,
                                        'category' => 'drone',
                                        'class' => 'drone-item',
                                        'variety' => 'gen2',
                                    ],
                                ]);
                            @endphp
                            @foreach ($drones as $id => $drone)
                                <div class="col-auto drone-item"data-variety="{{ $drone['variety'] }} ">
                                    <a href="{{ route('shop.show', $id) }}" class="text-decoration-none">
                                        <x-product-card :id="$id" :img="$drone['img']" :title="$drone['title']"
                                            :price="$drone['price']" :category="$drone['category']" :variety="$drone['variety']" :item-class="$drone['class']" />
                                    </a>
                                </div>
                            @endforeach


                        </div>
                    </div>

                    <!-- สไลด์ถัดไป ( Card  3 ใบ) -->
                    {{-- <div class="carousel-item">


                    </div> --}}
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#droCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#droCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>




    <script src="{{ asset('js/home.filter.js') }}"></script>










@endsection
