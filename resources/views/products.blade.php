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
                <option value="">สินค้าทั้งหมด</option>
                <option value="">หนังสือ</option>
                <option value="">อุปกรณ์วิทยาศาตร์</option>
                <option value="">สารเคมี</option>
                <option value="">โดรน</option>
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

        <!-- Card 1 -->
        <div class="col-auto">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="img/books/book1.jpg" class="card-img-top" alt="Book 1">


                </div>
                <div class="card-body">
                    <p class="card-text product-title">
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
        <div class="col-auto">
            <div class="card product-card">
                <img src="img/books/book2.jpg" class="card-img-top" alt="Book 2">
                <div class="card-body">
                    <p class="card-text product-title">
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
        <div class="col-auto">
            <div class="card product-card">
                </button>

                <img src="img/books/book3.jpg" class="card-img-top" alt="Book 3">
                <div class="card-body">
                    <p class="card-text product-title">
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
    <br>
    <div class="row gx-3 gy-4 justify-content-center">

        <!-- Card 1 -->
        <div class="col-auto">
            <div class="card product-card">
                <div class="position-relative">
                    <img src="img/science/1.jpg" class="card-img-top" alt="science">
                </div>
                <div class="card-body">
                    <p class="card-text product-title">
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
        <div class="col-auto">
            <div class="card product-card">
                <img src="img/science/2.jpg" class="card-img-top" alt="science">
                <div class="card-body">
                    <p class="card-text product-title">
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
        <div class="col-auto">
            <div class="card product-card">
                </button>

                <img src="img/science/3.jpg" class="card-img-top" alt="science">
                <div class="card-body">
                    <p class="card-text product-title">
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
<br>

      <div class="row gx-3 gy-4 justify-content-center">

                            <!-- Card 1 -->
                            <div class="col-auto">
                                <div class="card product-card">
                                    <div class="position-relative">
                                        <img src="img/chemistry/1.jpg" class="card-img-top" alt="chemicals">


                                    </div>
                                    <div class="card-body">
                                        <p class="card-text product-title">
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
                            <div class="col-auto">
                                <div class="card product-card">
                                    <img src="img/chemistry/2.jpg" class="card-img-top" alt="chemicals">
                                    <div class="card-body">
                                        <p class="card-text product-title">
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
                            <div class="col-auto">
                                <div class="card product-card">
                                    </button>

                                    <img src="img/chemistry/3.jpg" class="card-img-top" alt="chemicals">
                                    <div class="card-body">
                                        <p class="card-text product-title">
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
<br>

                        <div class="row gx-3 gy-4 justify-content-center">

                            <!-- Card 1 -->
                            <div class="col-auto">
                                <div class="card product-card">
                                    <div class="position-relative">
                                        <img src="img/drone/1.jpg" class="card-img-top" alt="drone">


                                    </div>
                                    <div class="card-body">
                                        <p class="card-text product-title">
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
                                <div class="card product-card">
                                    <img src="img/drone/2.jpg" class="card-img-top" alt="drone">
                                    <div class="card-body">
                                        <p class="card-text product-title">
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
                            <div class="col-auto">
                                <div class="card product-card">
                                    </button>

                                    <img src="img/drone/3.jpg" class="card-img-top" alt="drone">
                                    <div class="card-body">
                                        <p class="card-text product-title">
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














@endsection
