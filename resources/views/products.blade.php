@extends('layouts.app')
@section('title', 'products')
@section('content')
    <!-- HTML -->
    <div class="filter-bar mt-3">
        <!-- ค้นหา -->
        <div class="filter-item">
            <label for="search">ค้นหา</label>
            <div class="search-box">
                <input type="text" id="search" placeholder="ค้นหา…">
                <button type="submit" class="search-btn">

                    <img src="/images/search.png" alt="search">

                </button>
            </div>
        </div>

        <!-- หมวดหมู่สินค้า -->
        <div class="filter-item">
            <label for="category">หมวดหมู่สินค้า</label>
            <select id="category">
                <option value="all">สินค้าทั้งหมด</option>
                <option value="books">หนังสือ</option>
                <option value="kits">อุปกรณ์วิทยาศาตร์</option>
                <option value="chemecals">สารเคมี</option>
                <option value="drone">โดรน</option>
            </select>
        </div>

        <!-- ราคาเริ่มต้น -->
        <div class="filter-item">
            <label>ราคาเริ่มต้น</label>
            <div class="price-range">
                <input type="number" id="price-min" placeholder="0">
                <span>ถึง</span>
                <input type="number" id="price-max" placeholder="0">
                <span>บาท</span>
            </div>
        </div>
    </div>

    <br>
    <div class="row gx-3 gy-4 justify-content-center">

        <!-- หนังสือ Card 1 -->
        <div class="col-auto ">
            <div class="card product-card product-item" data-category="books" data-price="150">
                <div class="position-relative">
                    <img src="img/books/book1.jpg" class="card-img-top" alt="Book 1">
                </div>
                <div class="card-body">
                    <p class="card-text product-title">
                        หนังสือวิทยาศาสตร์และเทคโนโลยี <br>
                        เล่ม 1 ม.3
                    </p>
                    <span class="product-price">฿150.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <!-- หนังสือ Card 2 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="books" data-price="200">
                <img src="img/books/book2.jpg" class="card-img-top" alt="Book 2">
                <div class="card-body">
                    <p class="card-text product-title">
                        หนังสือกุญชาญาณ เพื่อส่งเสริม<br>อัจฉริยภาพคณิตศาสตร์สำหรับเด็ก

                    </p>
                    <span class="product-price">฿200.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <!-- หนังสือ Card 3 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="books" data-price="180">
                </button>

                <img src="img/books/book3.jpg" class="card-img-top" alt="Book 3">
                <div class="card-body">
                    <p class="card-text product-title">
                        หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย
                    </p>
                    <span class="product-price">฿180.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <br>


        <!-- อุปกรณ์ Card 1 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="kits" data-price="250">

                <div class="position-relative ">
                    <img src="img/science/1.jpg" class="card-img-top" alt="science">
                </div>
                <div class="card-body">
                    <p class="card-text product-title">
                        แก้วบีกเกอร์

                    </p>
                    <span class="product-price">฿250.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <!-- อุปกรณ์ Card 2 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="kits" data-price="100">
                <img src="img/science/2.jpg" class="card-img-top" alt="science">
                <div class="card-body">
                    <p class="card-text product-title">
                        ขวดทดลอง
                    </p>
                    <span class="product-price">฿100.00</span>

                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <!-- อุปกรณ์ Card 3 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="kits" data-price="475">
                </button>

                <img src="img/science/3.jpg" class="card-img-top" alt="science">
                <div class="card-body">
                    <p class="card-text product-title">
                        หลอดทดลอง

                    </p>
                    <span class="product-price">฿475.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>


        <br>



        <!-- สารเคมี Card 1 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="chemecals" data-price="65">
                <div class="position-relative">
                    <img src="img/chemistry/1.jpg" class="card-img-top" alt="chemicals">


                </div>
                <div class="card-body">
                    <p class="card-text product-title">
                        Hydrochloric Acid (HCl)

                    </p>
                    <span class="product-price">฿65.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <!-- สารเคมี  Card 2 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="chemecals" data-price="80">
                <img src="img/chemistry/2.jpg" class="card-img-top" alt="chemicals">
                <div class="card-body">
                    <p class="card-text product-title">
                        Sodium Hydroxide (NaOH)

                    </p>
                    <span class="product-price">฿80.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <!-- สารเคมี Card 3 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="chemecals" data-price="80">
                </button>

                <img src="img/chemistry/3.jpg" class="card-img-top" alt="chemicals">
                <div class="card-body">
                    <p class="card-text product-title">
                        sulfurric acid

                    </p>
                    <span class="product-price">฿80.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>


        <br>



        <!-- โดรน Card 1 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="drone" data-price="10000">
                <div class="position-relative">
                    <img src="img/drone/1.jpg" class="card-img-top" alt="drone">


                </div>
                <div class="card-body">
                    <p class="card-text product-title ">
                        โดรน GEN1
                    </p>
                    <span class="product-price">฿10,000.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <!-- โดรน Card 2 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="drone" data-price="12000">
                <img src="img/drone/2.jpg" class="card-img-top" alt="drone">
                <div class="card-body">
                    <p class="card-text product-title">
                        โดรน GEN2

                    </p>
                    <span class="product-price">฿12,000.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>

        <!-- โดรน Card 3 -->
        <div class="col-auto">
            <div class="card product-card product-item" data-category="drone" data-price="15000">
                </button>

                <img src="img/drone/3.jpg" class="card-img-top" alt="drone">
                <div class="card-body">
                    <p class="card-text product-title">
                        โดรน GEN2 LT

                    </p>
                    <span class="product-price">฿15,000.00</span>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-pink btn-sm">
                        <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                    </button>

                </div>
            </div>
        </div>
    </div>













    <script src="{{ asset('js/product.filter.js') }}"></script>
@endsection
