<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PRE-ORDER')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.styles.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container">

        <!--  TOP HEADER -->

        <div class="container d-flex justify-content-between align-items-center">
            <!--  LOGO -->
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center">
                <img src="{{ asset('img/box-icon.png') }}" alt="Logo" width="100" class="me-2">
                <h2 class="mb-0 gradient-text fw-bold text-uppercase py-1">
                    PRE-<span style="font-style: italic;">ORDER</span>
                </h2>
            </a>

            <div class="d-flex align-items-end gap-4 ms-auto">
                <div class="text-center">
                    <a href="{{ url('/wishlist') }}" class="link-icon text-decoration-none">
                        <img src="https://img.icons8.com/ios-filled/28/000000/like.png" alt="like" class="mb-1">
                        <div class="small fw-light">รายการโปรด</div>
                    </a>
                </div>
                <div class="text-center">
                    <a href="{{ url('/cart') }}" class="link-icon text-decoration-none">
                        <img src="https://img.icons8.com/ios-filled/28/000000/shopping-cart.png" alt="cart"
                            class="mb-1">
                        <div class="small fw-light">รถเข็น</div>
                    </a>
                </div>
                <div class="text-center">
                    <a href="{{ url('/login') }}" class="link-icon text-decoration-none">
                        <img src="https://img.icons8.com/ios-filled/28/000000/user.png" alt="user" class="mb-1">
                        <div class="small fw-light">สมาชิก</div>
                    </a>
                </div>
            </div>

        </div>


        <nav class="navbar navbar-expand-lg py-1" style="background-color: #ff40a4;">
            <div class="container">
                <div class="collapse navbar-collapse show">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link  text-white fw-normal px-3">แนะนำ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/products') }}" class="nav-link  text-white fw-normal px-3">สินค้า</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/books') }}"
                                class="nav-link  text-white fw-normal px-3">หนังสือ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/science-tools') }}" class="nav-link  text-white fw-normal px-2">อุปกรณ์วิทยาศาสตร์</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/chemicals') }}" class="nav-link  text-white fw-normal px-2">สารเคมี</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/drones') }}" class="nav-link  text-white fw-normal px-2">โดรน</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/orders') }}"
                                class="nav-link  text-white fw-normal px-2">ประวัติคำสั่งซื้อ</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link  dropdown-toggle text-white fw-normal px-2" href="#"
                                id="moreDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                เพิ่มเติม
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreDropdown">
                                <li><a class="dropdown-item" href="{{ url('/about') }}">เกี่ยวกับเรา</a></li>
                                <li><a class="dropdown-item" href="{{ url('/contact') }}">ติดต่อเรา</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="{{ url('/private') }}">นโยบายความเป็นส่วนตัว</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        
        @yield('content')
        
      
       <footer class="site-footer bg-pink text-white pt-5 pb-3 mt-5">
        <div class="container">
            <div class="row">
                <!-- Column 1: Main menu -->
                <div class="col-12 col-md-4 mb-4 mb-md-0">
                    <ul class="list-unstyled footer-menu">
                        <li><a href="#" class="text-white">หน้าหลัก</a></li>
                        <li><a href="/products" class="text-white">สินค้า</a></li>
                        <li><a href="#" class="text-white">หนังสือ</a></li>
                        <li><a href="#" class="text-white">อุปกรณ์วิทยาศาสตร์</a></li>
                        <li><a href="#" class="text-white">สารเคมี</a></li>
                        <li><a href="#" class="text-white">โดรน</a></li>
                        <li><a href="#" class="text-white">ประวัติคำสั่งซื้อ</a></li>
                        <li><a href="#" class="text-white">เพิ่มเติม</a></li>
                    </ul>
                </div>

                <!-- Column 2: Company info -->
                <div class="col-12 col-md-4 mb-4 mb-md-0 mt-4">
                    <p class="mb-1">บริษัท พรีออเดอร์ จำกัด</p>
                    <p class="mb-1">123/45 ถนน×××××××× แขวง×××××× เขต×××××</p>
                    <p class="mb-1">กรุงเทพฯ ×××××</p>
                    <p class="mb-1">โทร: 02-123-4567</p>
                    <p class="mb-1">อีเมล: contact@lightshop.co.th</p>
                    <p class="mb-0">เวลาทำการ: จันทร์ – เสาร์ 09:00 – 18:00 น.</p>
                </div>

                <!-- Column 3: Policies -->
                <div class="col-12 col-md-4">
                    <ul class="list-unstyled footer-menu">
                        <li><a href="#" class="text-white">เงื่อนไขการให้บริการ</a></li>
                        <li><a href="#" class="text-white">นโยบายความเป็นส่วนตัว</a></li>
                        <li><a href="#" class="text-white">นโยบายการคืนสินค้า</a></li>
                        <li><a href="#" class="text-white">คำถามที่พบบ่อย (FAQ)</a></li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="text-center mt-4">
                © 2025 PRE-ORDER. All Rights Reserved.
            </div>
        </div>
    </footer> 
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>




</body>

</html>
