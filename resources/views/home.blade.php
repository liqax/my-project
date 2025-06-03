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
            
    
      <div class="col-12">
        <div class="category-box p-4 rounded-3">
          <div class="row gy-3 gx-3 justify-content-center">
            {{-- ตัวอย่าง Card หมวดหมู่สินค้า 4 หมวด --}}
            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
              <a href="{{ url('/products?category=books') }}" class="text-decoration-none">
                <div class="category-text h-100 text-center p-3">
                  <div class="icon-wrapper mb-2">
                    {{-- ใช้ไอคอน Font Awesome หรือ Bootstrap Icon ก็ได้ --}}
                    <i class="bi bi-book-half fs-2 text-pink"></i>
                  </div>
                  <div class="category-name fw-semibold">หนังสือ</div>
                </div>
              </a>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
              <a href="{{ url('/products?category=science') }}" class="text-decoration-none">
                <div class="category-text h-100 text-center p-3">
                  <div class="icon-wrapper mb-2">
                    <i class="bi bi-beaker-fill fs-2 text-pink"></i>
                  </div>
                  <div class="category-name fw-semibold">อุปกรณ์วิทยาศาสตร์</div>
                </div>
              </a>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
              <a href="{{ url('/products?category=chemicals') }}" class="text-decoration-none">
                <div class="category-text h-100 text-center p-3">
                  <div class="icon-wrapper mb-2">
                    <i class="bi bi-droplet-half fs-2 text-pink"></i>
                  </div>
                  <div class="category-name fw-semibold">สารเคมี</div>
                </div>
              </a>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-lg-2">
              <a href="{{ url('/products?category=drone') }}" class="text-decoration-none">
                <div class="category-text h-100 text-center p-3">
                  <div class="icon-wrapper mb-2">
                    <i class="bi bi-controller fs-2 text-pink"></i>
                  </div>
                  <div class="category-name fw-semibold">โดรน</div>
                </div>
              </a>
            </div>

            {{-- เพิ่มเติม: สามารถใส่หมวดสินค้าอื่นต่อได้ตามต้องการ --}}
          </div>
        </div>
      </div>
          
 </div>
    </section>




    

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


    <section id="bookSection" class="Products-section py-5">
        <div class="container">

            <!-- หัวเรื่อง + ปุ่มกรอง -->
            <div class="d-flex flex-wrap align-items-center mb-4 ">
                <h2 class="ms-0 section-title">หนังสือ</h2>
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
                                    [
                                        'img' => 'img/books/book1.jpg',
                                        'title' => "หนังสือวิทยาศาสตร์และเทคโนโลยี\nเล่ม 1 ม.3",
                                        'price' => 110.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'booksci',
                                    ],
                                    [
                                        'img' => 'img/books/book2.jpg',
                                        'title' => " หนังสือกุญชาญาณ เพื่อส่งเสริม\nอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก",
                                        'price' => 140.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'calcu',
                                    ],
                                    [
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
                                <x-product-card :img="$book['img']" :title="$book['title']" :price="$book['price']" :variety="$book['variety']"
                                    :item-class="$book['class']" />
                            @endforeach
                        </div>
                    </div>


                    <div class="carousel-item">
                        <div class="row gx-3 gy-4 justify-content-center" id="bookContainer">

                            @php
                                $books = collect([
                                    [
                                        'img' => 'img/books/book4.jpg',
                                        'title' => 'หนังสือเมฆน้อยสีเทา',
                                        'price' => 100.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'kid',
                                    ],
                                    [
                                        'img' => 'img/books/book5.jpg',
                                        'title' => ' หนังสือเราเป็นเพื่อนที่ต่อกัน',
                                        'price' => 120.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'kid',
                                    ],
                                    [
                                        'img' => 'img/books/book6.jpg',
                                        'title' => ' หนังสือพี่ชายที่แสนดี',
                                        'price' => 110.0,
                                        'category' => 'books',
                                        'class' => 'book-item',
                                        'variety' => 'kid',
                                    ],
                                ]);
                            @endphp
                            @foreach ($books as $book)
                                <x-product-card :img="$book['img']" :title="$book['title']" :price="$book['price']" :variety="$book['variety']"
                                    :category="$book['category']" :item-class="$book['class']" />
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
            <div class="d-flex flex-wrap align-items-center mb-4">
                <h2 class="ms-0 section-title">อุปกรณ์วิทยาศาสตร์</h2>
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
                                    [
                                        'img' => 'img/science/1.jpg',
                                        'title' => 'แก้วบีกเกอร์',
                                        'price' => 250.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                    [
                                        'img' => 'img/science/2.jpg',
                                        'title' => ' ขวดทดลอง',
                                        'price' => 100.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                    [
                                        'img' => 'img/science/3.jpg',
                                        'title' => ' หลอดทดลอง',
                                        'price' => 475.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                ]);
                            @endphp
                            @foreach ($science as $sci)
                                <x-product-card :img="$sci['img']" :title="$sci['title']" :price="$sci['price']" :category="$sci['category']"
                                    :variety="$sci['variety']" :item-class="$sci['class']" />
                            @endforeach
                        </div>
                    </div>

                    <!-- สไลด์ถัดไป ( Card  3 ใบ) -->
                    <div class="carousel-item">
                        <div class="row gx-3 gy-4 justify-content-center" id="sciContainer">

                            @php
                                $science = collect([
                                    [
                                        'img' => 'img/science/4.jpg',
                                        'title' => 'ถาดหลุม',
                                        'price' => 50.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'testtube',
                                    ],
                                    [
                                        'img' => 'img/science/5.jpg',
                                        'title' => ' กรวยแก้ว',
                                        'price' => 85.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                    [
                                        'img' => 'img/science/6.jpg',
                                        'title' => 'ถ้วยแก้ว ',
                                        'price' => 70.0,
                                        'category' => 'kits',
                                        'class' => 'sci-item',
                                        'variety' => 'glassware',
                                    ],
                                ]);
                            @endphp
                            @foreach ($science as $sci)
                                <x-product-card :img="$sci['img']" :title="$sci['title']" :price="$sci['price']" :category="$sci['category']"
                                    :variety="$sci['variety']" :item-class="$sci['class']" />
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
            <div class="d-flex flex-wrap align-items-center mb-4">
                <h2 class="ms-0 section-title">สารเคมี</h2>
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
                                    [
                                        'img' => 'img/chemistry/1.jpg',
                                        'title' => 'Hydrochloric Acid (HCl)',
                                        'price' => 65.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'all',
                                    ],
                                    [
                                        'img' => 'img/chemistry/2.jpg',
                                        'title' => ' Sodium Hydroxide (NaOH)',
                                        'price' => 80.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'anin',
                                    ],
                                    [
                                        'img' => 'img/chemistry/3.jpg',
                                        'title' => ' sulfuric acid',
                                        'price' => 80.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'anin',
                                    ],
                                ]);
                            @endphp
                            @foreach ($chemistry as $che)
                                <x-product-card :img="$che['img']" :title="$che['title']" :price="$che['price']" :category="$che['category']"
                                    :variety="$che['variety']" :item-class="$che['class']" />
                            @endforeach

                        </div>
                    </di    v> 

                    <!-- สไลด์ถัดไป (Card 3) -->
                    <div class="carousel-item">
                        <div class="row gx-3 gy-4 justify-content-center"id="cheContainer">

                            @php
                                $chemistry = collect([
                                    [
                                        'img' => 'img/chemistry/4.jpg',
                                        'title' => 'สารละลายเมทิลเรด',
                                        'price' => 75.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'solut',
                                    ],
                                    [
                                        'img' => 'img/chemistry/5.jpg',
                                        'title' => 'สารละลายยูนิเวอร์ซัล',
                                        'price' => 75.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'solut',
                                    ],
                                    [
                                        'img' => 'img/chemistry/6.jpg',
                                        'title' => 'กรดไนตริก เจือจาง 2โมล',
                                        'price' => 85.0,
                                        'category' => 'chemecals',
                                        'class' => 'che-item',
                                        'variety' => 'solut',
                                    ],
                                ]);
                            @endphp
                            @foreach ($chemistry as $che)
                                <x-product-card :img="$che['img']" :title="$che['title']" :price="$che['price']" :category="$che['category']"
                                    :variety="$che['variety']" :item-class="$che['class']" />
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
                            @php
                                $drones = collect([
                                    [
                                        'img' => 'img/drone/1.jpg',
                                        'title' => 'โดรน GEN1',
                                        'price' => 10000.0,
                                        'category' => 'drone',
                                        'class' => 'drone-item',
                                        'variety' => 'gen1',
                                    ],
                                    [
                                        'img' => 'img/drone/2.jpg',
                                        'title' => ' โดรน GEN2',
                                        'price' => 12000.0,
                                        'category' => 'drone',
                                        'class' => 'drone-item',
                                        'variety' => 'gen2',
                                    ],
                                    [
                                        'img' => 'img/drone/3.jpg',
                                        'title' => ' โดรน GEN2 LT',
                                        'price' => 15000.0,
                                        'category' => 'drone',
                                        'class' => 'drone-item',
                                        'variety' => 'gen2',
                                    ],
                                ]);
                            @endphp
                            @foreach ($drones as $drone)
                                <x-product-card
                                 :img="$drone['img']" :title="$drone['title']" 
                                 :price="$drone['price']" 
                                 :category="$drone['category']"
                                :variety="$drone['variety']" 
                                :item-class="$drone['class']" />
                            @endforeach


                        </div>
                    </div>

                    <!-- สไลด์ถัดไป ( Card  3 ใบ) -->
                    <div class="carousel-item">


                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#droneCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#droneCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>
    </section>




    <script src="{{ asset('js/home.filter.js') }}"></script>



 







@endsection
