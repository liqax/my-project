@extends('layouts.app')

@section('title', 'home')

@section('content')



    <!-- Bootstrap Carousel -->
    <div id="mainSlider" class="carousel slide carousel-hover-show" data-bs-ride="carousel">

        <!--  ภาพสไลด์ -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/main-banner.jpg') }}" class="d-block w-100" alt="banner">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/bg2.png') }}" class="d-block w-100" alt="bg2">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/bg3.png') }}" class="d-block w-100" alt="bg3">
            </div>
        </div>

        <!--  ปุ่มเลื่อน -->
        <button class="carousel-control-prev" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#mainSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
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
                        <img src="{{ asset('img/main-banner.jpg') }}" alt="pre order">
                    </div>
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/bg2.png') }}" alt="pre order">
                    </div>
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/bg3.png') }}" alt="pre order">
                    </div>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <div class="d-flex product-slide-row">
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/bg2.png') }}" alt="pre order">
                    </div>
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/bg3.png') }}" alt="pre order">
                    </div>
                    <div class="card shadow-sm">
                        <img src="{{ asset('img/bg2.png') }}" alt="pre order">
                    </div>
                </div>
            </div>
        </div>

        <!-- CONTROLS -->
        <button class="carousel-control-prev custom-carousel-btn" type="button" data-bs-target="#productCarousel"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next custom-carousel-btn" type="button" data-bs-target="#productCarousel"
            data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>


    <!-- ##################################################################################################################### -->


    <!-- หมวดหมู่สินค้า -->

    <section class="category-section pt-4 mt-4 ">
        <div class="container">
            <h4 class="section-title ">เลือกซื้อตามหมวดหมู่สินค้า</h4>

            <div class="categories">
                @foreach ($categories as $cat)
                    <div class="category-card">
                        <img src="{{ asset('img/categories/' . $cat['icon']) }}" alt="{{ $cat['label'] }}">
                        <small>{{ $cat['label'] }}</small>
                    </div>
                @endforeach
            </div>
        </div>
    </section>




    {{-- ... ส่วนหมวดหมู่สินค้า ... --}}

    {{-- CTA bar --}}
    <section class="cta-bar text-center mt-4">
        <div class="container-fluid px-0">
            <div class="py-3" style="background-color: #ff40a4;">
                <h5 class="mb-0 text-white" style="font-weight: 700; font-size: 2rem;">
                    “จองที่นั่งสอบภาษาจีนของคุณตอนนี้เลย!”
                </h5>
            </div>
        </div>
    </section>

    {{-- Banner --}}
    <section class="mt-3">
        <div class="container-fluid px-0">
            <a href="/" target="_blank" rel="noopener">
                <img src="{{ asset('img/main-banner.jpg') }}" alt="จองสอบภาษาจีน" class="img-fluid w-auto banner-link"
                    style="max-height: 650px; object-fit: cover;">
            </a>
        </div>
    </section>




    <!-- ############################################################################################################# -->


    <section class="books-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4 ">
                <h2 class="ms-0 section-title">หนังสือ</h2>
                <div class="filter-buttons product-filter">
                    <button class="btn btn-outline-secondary filter-btn active me-2 mb-2"data-filter='all'>ทั้งหมด</button>
                    <button
                        class="btn btn-outline-secondary filter-btn me-2 mb-2"data-filter='booksci'>หนังสือวิทย์</button>
                    <button class="btn btn-outline-secondary filter-btn mb-2"data-filter='calcu'>หนังสือคณิต</button>
                </div>
            </div>

            <!-- Carousel สินค้า 3 ใบ ต่อสไลด์ -->
            <div id="bookCarousel" class="carousel slide" data-bs-interval="false" data-bs-touch="false">
                <div class="carousel-inner overflow-visible">

                    <!-- สไลด์แรก -->
                    <div class="carousel-item active">
                        <div class="row gx-3 gy-4 justify-content-center" id="bookContainer">

                            <!-- Card 1 -->
                            <div class="col-auto book-item"data-category="booksci">
                                <div class="card book-card">
                                    <div class="position-relative">
                                        <img src="img/books/book1.jpg" class="card-img-top" alt="Book 1">


                                    </div>
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            หนังสือวิทยาศาสตร์และเทคโนโลยี เล่ม 1 ม.3
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-auto  book-item "data-category="calcu">
                                <div class="card book-card">
                                    <img src="img/books/book2.jpg" class="card-img-top" alt="Book 2">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            หนังสือกุญชาญาณ เพื่อส่งเสริมอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-auto  book-item " data-category="calcu">
                                <div class="card book-card">
                                    </button>

                                    <img src="img/books/book3.jpg" class="card-img-top" alt="Book 3">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>


                    <div class="carousel-item">
                        <!-- row gx-3 gy-4… ใส่ card 3 ใบลักษณะเดียวกัน -->
                        {{-- <div class="row gx-3 gy-4 justify-content-center" id="bookContainer">

                            <!-- Card 1 -->
                            <div class="col-auto book-item"data-category="science">
                                <div class="card book-card">
                                    <div class="position-relative">
                                        <img src="img/books/book1.jpg" class="card-img-top" alt="Book 1">


                                    </div>
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            หนังสือวิทยาศาสตร์และเทคโนโลยี เล่ม 1 ม.3
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-auto  book-item "data-category="calcu">
                                <div class="card book-card">
                                    <img src="img/books/book2.jpg" class="card-img-top" alt="Book 2">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            หนังสือกุญชาญาณ เพื่อส่งเสริมอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-auto  book-item " data-category="calcu">
                                <div class="card book-card">
                                    </button>

                                    <img src="img/books/book3.jpg" class="card-img-top" alt="Book 3">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>





    {{-- ######################################################################################################################### --}}






    <section class="books-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4">
                <h2 class="ms-0 section-title">อุปกรณ์วิทยาศาสตร์</h2>
                <div class="filter-buttons">
                    <button
                        class="btn btn-outline-secondary scifilter-btn active me-2 mb-2 "data-filter='all'>ทั้งหมด</button>
                    <button
                        class="btn btn-outline-secondary scifilter-btn me-2 mb-2"data-filter='glassware'>เครื่องแก้ว</button>
                    <button class="btn btn-outline-secondary scifilter-btn mb-2"data-filter='testtube'>หลอดทดลอง</button>
                </div>
            </div>

            <!-- Carousel สินค้า 3 ใบ ต่อสไลด์ -->
            <div id="bookCarousel" class="carousel slide" data-bs-interval="false" data-bs-touch="false">
                <div class="carousel-inner overflow-visible">

                    <!-- สไลด์แรก -->
                    <div class="carousel-item active">
                        <div class="row gx-3 gy-4 justify-content-center"id="sciContainer">

                            <!-- Card 1 -->
                            <div class="col-auto sci-item"data-category="glassware">
                                <div class="card book-card">
                                    <div class="position-relative">
                                        <img src="img/science/1.jpg" class="card-img-top" alt="science">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            แก้วบีกเกอร์
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-auto sci-item"data-category="glassware">
                                <div class="card book-card">
                                    <img src="img/science/2.jpg" class="card-img-top" alt="science">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            ขวดทดลอง
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-auto sci-item" data-category="testtube">
                                <div class="card book-card">
                                    </button>

                                    <img src="img/science/3.jpg" class="card-img-top" alt="science">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            หลอดทดลอง
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- สไลด์ตัวอย่างถัดไป (วาง Card อีก 3 ใบในลักษณะเดียวกัน) -->
                    <div class="carousel-item">
                        <!-- row gx-3 gy-4… ใส่ card 3 ใบลักษณะเดียวกัน -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ####################################################################################################### --}}

    <section class="books-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4">
                <h2 class="ms-0 section-title">สารเคมี</h2>
                <div class="filter-buttons">
                    <button
                        class="btn btn-outline-secondary chefilter-btn active me-2 mb-2 "data-filter='all'>ทั้งหมด</button>
                    <button class="btn btn-outline-secondary chefilter-btn me-2 mb-2"data-filter='sodium'>โซเดียม</button>
                    <button class="btn btn-outline-secondary chefilter-btn mb-2"data-filter='sulfur'>ซัลเฟอร์</button>
                </div>
            </div>

            <!-- Carousel สินค้า 3 ใบ ต่อสไลด์ -->
            <div id="bookCarousel" class="carousel slide" data-bs-interval="false" data-bs-touch="false">
                <div class="carousel-inner overflow-visible">

                    <!-- สไลด์แรก -->
                    <div class="carousel-item active">
                        <div class="row gx-3 gy-4 justify-content-center"id="cheContainer">

                            <!-- Card 1 -->
                            <div class="col-auto che-item"data-category='all'>
                                <div class="card book-card">
                                    <div class="position-relative">
                                        <img src="img/chemistry/1.jpg" class="card-img-top" alt="chemical">
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            Hydrochloric Acid (HCl)
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-auto che-item"data-category='sodium'>
                                <div class="card book-card ">
                                    <img src="img/chemistry/2.jpg" class="card-img-top" alt="chemical">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            Sodium Hydroxide (NaOH)
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-auto che-item"data-category='sulfur'>
                                <div class="card book-card">
                                    </button>

                                    <img src="img/chemistry/3.jpg" class="card-img-top" alt="chemical">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            sulfur
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- สไลด์ตัวอย่างถัดไป (วาง Card อีก 3 ใบในลักษณะเดียวกัน) -->
                    <div class="carousel-item">
                        <!-- row gx-3 gy-4… ใส่ card 3 ใบลักษณะเดียวกัน -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ####################################################################################################### --}}

    <section class="books-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4">
                <h2 class="ms-0 section-title">โดรน</h2>
                <div class="filter-buttons">
                    <button
                        class="btn btn-outline-secondary dronefilter-btn active me-2 mb-2 "data-filter='all'>ทั้งหมด</button>
                    <button class="btn btn-outline-secondary dronefilter-btn me-2 mb-2"data-filter='gen1'>GEN1</button>
                    <button class="btn btn-outline-secondary dronefilter-btn mb-2"data-filter='gen2'>GEN2</button>
                </div>
            </div>

            <!-- Carousel สินค้า 3 ใบ ต่อสไลด์ -->
            <div id="bookCarousel" class="carousel slide" data-bs-interval="false" data-bs-touch="false">
                <div class="carousel-inner overflow-visible">

                    <!-- สไลด์แรก -->
                    <div class="carousel-item active">
                        <div class="row gx-3 gy-4 justify-content-center" id="droneContainer">

                            <!-- Card 1 -->
                            <div class="col-auto drone-item"data-category="gen1">
                                <div class="card book-card">
                                    <div class="position-relative">
                                        <img src="img/drone/1.jpg" class="card-img-top" alt="">


                                    </div>
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            โดรน
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 2 -->
                            <div class="col-auto drone-item"data-category="gen2">
                                <div class="card book-card">
                                    <img src="img/drone/2.jpg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            โดรน
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                            <!-- Card 3 -->
                            <div class="col-auto drone-item"data-category="gen2">
                                <div class="card book-card">
                                    </button>

                                    <img src="img/drone/3.jpg" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <p class="card-text book-title">
                                            โดรน
                                        </p>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>






                    <!-- สไลด์ตัวอย่างถัดไป ( Card อีก 3 ใบในลักษณะเดียวกัน) -->
                    <div class="carousel-item">
                        <!-- Card 3 -->
                        <div class="col-auto">
                            <div class="card book-card">
                                </button>

                                <img src="img/drone/3.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <p class="card-text book-title">
                                        โดรน
                                    </p>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-pink btn-sm">
                                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                    </button>

                                </div>
                            </div>
                        </div>
                        <!-- Card 1 -->
                        <div class="col-auto">
                            <div class="card book-card">
                                </button>

                                <img src="img/drone/3.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <p class="card-text book-title">
                                        โดรน
                                    </p>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-pink btn-sm">
                                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                    </button>

                                </div>
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="col-auto">
                            <div class="card book-card">
                                <img src="img/drone/2.jpg" class="card-img-top" alt="">
                                <div class="card-body">
                                    <p class="card-text book-title">
                                        โดรน
                                    </p>
                                </div>
                                <div class="card-footer text-center">
                                    <button class="btn btn-pink btn-sm">
                                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                    </button>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>







@endsection


<script src="{{ asset('js/home.filter.js') }}"></script>
