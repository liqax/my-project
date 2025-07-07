@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')

    <!-- Bootstrap Carousel -->
    <div id="mainSlider" class="carousel slide carousel-hover-show" data-bs-ride="carousel">

        <!--  ภาพสไลด์ -->
        <div class="carousel-inner">
            @foreach ($mainSlides as $slide)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    <img src="{{ asset($slide->image_path) }}" class="d-block w-100" alt="Slide {{ $loop->iteration }}">
                </div>
            @endforeach
        </div>

        <!--  ปุ่มเลื่อน -->
        <button class="carousel-control-prev btn btn-pink" type="button" data-bs-target="#mainSlider" data-bs-slide="prev">
            ❮
        </button>
        <button class="carousel-control-next  btn btn-pink" type="button" data-bs-target="#mainSlider"
            data-bs-slide="next">
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
        {{-- INDICATORS --}}
        <div class="carousel-indicators">
            @foreach ($productSlides as $idx => $group)
                <button type="button" data-bs-target="#productCarousel" data-bs-slide-to="{{ $idx }}"
                    class="{{ $idx === 0 ? 'active' : '' }}"></button>
            @endforeach
        </div>

        {{-- SLIDES --}}
        <div class="carousel-inner mt-4">
            @foreach ($productSlides as $idx => $group)
                <div class="carousel-item {{ $idx === 0 ? 'active' : '' }}">
                    <div class="d-flex product-slide-row">
                        @foreach ($group as $slide)
                            <div class="card shadow-sm">
                                <img src="{{ asset($slide->image_path) }}" alt="pre order">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        {{-- CONTROLS --}}
        <button class="carousel-control-prev btn btn-pink" type="button" data-bs-target="#productCarousel"
            data-bs-slide="prev">❮</button>
        <button class="carousel-control-next btn btn-pink" type="button" data-bs-target="#productCarousel"
            data-bs-slide="next">❯</button>
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
                            @foreach ($categories as $cat)
                                <a href="{{ url('/products?category=' . $cat->slug) }}"
                                    class="nav-link category-item swiper-slide">
                                    <img src="{{ asset($cat->image_path) }}" alt="{{ $cat->name }}">
                                    <h3 class="category-title">{{ $cat->name }}</h3>
                                </a>
                            @endforeach
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
                            <a href="/products" class="btn-link text-decoration-none">ดูทั้งหมด →</a>
                            <div class="swiper-buttons">
                                <button class="swiper-prev brand-carousel-prev btn btn-pink">❮</button>
                                <button class="swiper-next brand-carousel-next btn btn-pink">❯</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">

                    <div class="brand-carousel swiper">
                        <div class="swiper-wrapper">

                            @foreach ($products as $product)
                                <div class="swiper-slide">
                                    <div class="card mb-3 p-3 rounded-4 shadow border-0">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset($product->image) }}" class="img-fluid rounded"
                                                    alt="{{ $product->name }}">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body py-0">
                                                    <p class="card-title mb-2 text-truncate-2">{{ $product->title }}</p>
                                                    <h5 class="card-title text-danger">
                                                        ฿{{ number_format($product->sale_price ?? $product->price, 2) }}
                                                    </h5>
                                                    @if ($product->sale_price)
                                                        <span
                                                            class="text-decoration-line-through     text-muted">฿{{ number_format($product->price, 2) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" home-new py-5 overflow-hidden">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="section-header d-flex flex-wrap flex-wrap justify-content-between mb-5">

                        <h2 class="section-title">สินค้าใหม่!</h2>

                        <div class="d-flex align-items-center">
                            <a href="/products" class="btn-link text-decoration-none">ดูทั้งหมด →</a>
                            <div class="swiper-buttons-new">
                                <button class="swiper-prev new-carousel-prev btn btn-pink">❮</button>
                                <button class="swiper-next new-carousel-next btn btn-pink">❯</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="new-carousel swiper">
                        <div class="swiper-wrapper">
                            @foreach ($newProducts as $product)
                                <div class="swiper-slide">
                                    <div class="product-card-new">
                                        <div class="badge-new-svg">
                                            <svg width="60" height="30" viewBox="0 0 60 30">
                                                <rect rx="15" ry="15" width="60" height="30"
                                                    fill="#FF3366" />
                                                <text x="30" y="20" text-anchor="middle" fill="#fff" font-size="14"
                                                    font-weight="bold">NEW</text>
                                            </svg>
                                        </div>
                                        <img src="{{ asset($product->image) }}" alt="{{ $product->title }}">
                                        <div class="info">
                                            <p class="title">{{ $product->title }}</p>
                                            <p class="price">
                                                <del>฿{{ number_format($product->price, 2) }}</del>
                                                <span class="sale">฿{{ number_format($product->sale_price, 2) }}</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
                    @foreach ($books->chunk(3) as $chunk)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row gx-3 gy-4 justify-content-center">
                                @foreach ($chunk as $book)
                                    <div class="col-auto book-item" data-variety="{{ $book->variety }}">
                                        <a href="{{ route('shop.show', $book->id) }}" class="text-decoration-none">
                                            <x-product-card :id="$book->id" :img="$book->image" :title="$book->title"
                                                :price="$book->price" :variety="$book->variety" :item-class="'book-item'" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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

                    @foreach ($science->chunk(3) as $chunk)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row gx-3 gy-4 justify-content-center">
                                @foreach ($chunk as $sci)
                                    <div class="col-auto sci-item" data-variety="{{ $sci->variety }}">
                                        <a href="{{ route('shop.show', $sci->id) }}" class="text-decoration-none">
                                            <x-product-card :id="$sci->id" :img="$sci->image" :title="$sci->title"
                                                :price="$sci->price" :variety="$sci->variety" :item-class="'sci-item'" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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
                    @foreach ($chemistry->chunk(3) as $chunk)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row gx-3 gy-4 justify-content-center">
                                @foreach ($chunk as $che)
                                    <div class="col-auto che-item" data-variety="{{ $che->variety }}">
                                        <a href="{{ route('shop.show', $che->id) }}" class="text-decoration-none">
                                            <x-product-card :id="$che->id" :img="$che->image" :title="$che->title"
                                                :price="$che->price" :variety="$che->variety" :item-class="'che-item'" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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
                    @foreach ($drones->chunk(3) as $chunk)
                        <div class="carousel-item @if ($loop->first) active @endif">
                            <div class="row gx-3 gy-4 justify-content-center">
                                @foreach ($chunk as $drone)
                                    <div class="col-auto drone-item" data-variety="{{ $drone->variety }}">
                                        <a href="{{ route('shop.show', $drone->id) }}" class="text-decoration-none">
                                            <x-product-card :id="$drone->id" :img="$drone->image" :title="$drone->title"
                                                :price="$drone->price" :variety="$drone->variety" :item-class="'drone-item'" />
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{ asset('js/home.filter.js') }}"></script>



@endsection
