<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PRE-ORDER')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="img/box-icon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="img/box-icon.png">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/home.styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/products.styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/wishlist.styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/account.style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/orders.style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />



</head>

<body>


    {{-- Preloader --}}
    @include('partials.preloader')

    <div class="container">
        <!--  TOP HEADER -->
        <div class="container d-flex justify-content-between align-items-center">
            <!--  LOGO -->
            <a href="{{ url('/') }}" class="navbar-brand d-flex align-items-center "title="PRE-ORDER">
                <img src="{{ asset('img/box-icon.png') }}" alt="Logo" width="100" class="me-2">
                <h2 class="mb-0 gradient-text fw-bold text-uppercase py-1">
                    PRE-<span style="font-style: italic;">ORDER</span>
                </h2>
            </a>
            <div class="d-flex align-items-end gap-4 ms-auto">
                <div class="text-center">
                    <a href="#" class="link-icon text-decoration-none" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <div class="position-relative">
                            <svg class="mb-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                    2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09
                                                      C13.09 3.81 14.76 3 16.5 3
                                                    19.58 3 22 5.42 22 8.5
                                                  c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                            </svg>
                            @php $wishlistIds = session('wishlist', []); @endphp
                            @if (count($wishlistIds) > 0)
                                <span class="counter qty">{{ count($wishlistIds) }}</span>
                            @endif
                        </div>
                        <div class="small fw-light">รายการโปรด </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                        <h6 class="fw-bold">รายการโปรดของคุณ</h6>
                        <hr class="mt-1 mb-2">
                        @php
                            // ดึงข้อมูลสินค้าที่อยู่ใน wishlist จาก session
                            $wishlistIds = session()->get('wishlist', []);
                            $allProducts = \App\Models\Product::whereIn('id', $wishlistIds)->get()->keyBy('id');
                            $wishlistItems = collect($wishlistIds)->map(fn($id) => $allProducts->get($id))->filter();
                        @endphp

                        @if (count($wishlistItems))


                            @foreach ($wishlistItems as $item)
                                <div class="d-flex mb-2 small">
                                    <img src="{{ asset($item['image']) }}" alt=""
                                        style="width:40px; height:40px; object-fit:cover; margin-right: 0.5rem;">
                                    <div class="flex-grow-1" style="max-width: 250px">
                                        <div class="fw-semibold">{{ $item['title'] }}</div>
                                        <div class="text-pink">฿{{ number_format($item['price'], 2) }}</div>
                                        <form action="{{ route('wishlist.remove') }}" method="POST" class="mt-1">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="bi bi-trash-fill"></i> ลบ
                                            </button>
                                        </form>
                                    </div>
                                </div>
                                <hr class="my-2">
                            @endforeach

                            <div class="text-center">
                                <a href="{{ route('wishlist.view') }}" class="btn btn-primary w-100">
                                    ดูรายการโปรดทั้งหมด
                                </a>
                            </div>
                        @else
                            <div class=" text-muted small">
                                คุณไม่มีสินค้าในรายการโปรด.
                            </div>
                        @endif
                    </div>
                </div>

                <div class="text-center position-relative">
                    <a href="{{ url('/cart') }}" class="link-icon text-decoration-none"data-bs-toggle="dropdown">
                        <svg class="mb-icon" xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                            viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10
                        0c-1.1 0-1.99.9-1.99 2S15.9 22 17
                           22s2-.9 2-2-.9-2-2-2zM7.2 14h9.45c.75 0
                      1.41-.41 1.75-1.03l3.58-6.49A1
                          1 0 0 0 21 5H5.21L4.27 3H1v2h2l3.6
                      7.59-1.35 2.44C4.52 15.37 5.48
                          17 7 17h12v-2H7.42c-.14
                              0-.25-.11-.25-.25l.03-.12L7.2 14z" />
                        </svg>
                        @php $cart = session('cart', []); @endphp
                        @if (count($cart) > 0)
                            <span class="counter qty">{{ count($cart) }}</span>
                        @endif
                        <div class="small fw-light">ตะกร้าสินค้า</div>
                    </a>

                    {{-- เมนู dropdown --}}
                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                        <h6 class="fw-bold">รายการสินค้าของคุณ</h6>
                        <hr class="mt-1 mb-2">

                        @php
                            // ดึงข้อมูลตะกร้าจาก session (ถ้าไม่มี ให้เป็น array เปล่า)
                            $cart = session('cart', []);
                            // คำนวณราคารวมทั้งหมด
                            $totalAmount = 0;
                            foreach ($cart as $productId => $item) {
                                $totalAmount += $item['price'] * $item['qty'];
                            }
                        @endphp

                        {{-- กรณีมีสินค้าในตะกร้า --}}
                        @if (count($cart))
                            {{-- วนลูปรายการสินค้าแต่ละชิ้น --}}
                            @foreach ($cart as $productId => $item)
                                @php
                                    $subtotal = $item['price'] * $item['qty'];
                                @endphp
                                <div class="d-flex mb-2 small">

                                    <img src="{{ asset($item['img']) }}" alt=""
                                        style="width:40px; height:40px; object-fit:cover; margin-right: 0.5rem;">

                                    <div class="flex-grow-1">
                                        {{-- ชื่อสินค้า --}}
                                        <div class="fw-semibold">{{ $item['title'] }}</div>
                                        {{-- จำนวน × ราคา --}}
                                        <div class="text-muted small">
                                            จำนวน: {{ $item['qty'] }} ×
                                            ฿{{ number_format($item['price'], 2) }}
                                        </div>
                                    </div>

                                    {{-- ราคารวมของรายการนั้น --}}
                                    <div class="text-end">
                                        <span class="fw-bold">฿{{ number_format($subtotal, 2) }}</span>
                                    </div>
                                </div>
                                <hr class="my-1">
                            @endforeach

                            {{-- สรุปราคารวมทั้งหมด --}}
                            <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
                                <div class="fw-semibold">รวมทั้งหมด:</div>
                                <div class="text-danger fw-bold">฿{{ number_format($totalAmount, 2) }}</div>
                            </div>

                            {{-- ปุ่มลิงก์ไปหน้าดูตะกร้าทั้งหมด (cart.view) --}}
                            <div class="d-grid">
                                <a href="{{ route('cart.view') }}" class="btn btn-primary w-100 mb-2">
                                    ดูตะกร้าทั้งหมด
                                </a>

                            </div>
                        @else
                            {{-- กรณีตะกร้าว่าง --}}
                            <div class="text-center text-muted small">
                                คุณไม่มีสินค้าในตะกร้า.
                            </div>
                        @endif

                    </div>
                </div>

                <div class="text-center">
                    {{-- โค้ดนี้จะรวมทั้งสถานะ Guest และ Authenticated User ไว้ใน A Tag เดียวกัน --}}
                    <a class="link-icon text-decoration-none text-white" href="#" role="button"
                        id="dropdownUserMenu" {{-- ถ้าเป็น Guest ให้เปิด Modal --}}
                        @guest
data-bs-toggle="modal" data-bs-target="#authModal" @endguest {{-- ถ้าเป็น Authenticated User ให้เปิด Dropdown --}}
                        @auth
data-bs-toggle="dropdown" aria-expanded="false" @endauth>
                        {{-- ไอคอนผู้ใช้ --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor"
                            viewBox="0 0 16 16" class="mb-icon">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3z" />
                            <path fill-rule="evenodd" d="M8 8a3 3 0 100-6 3 3 0 000 6z" />
                        </svg>

                        {{-- ข้อความ สวัสดี, [ชื่อ] หรือ สมาชิก --}}
                        @auth
                            <div class="small fw-light">สวัสดี, {{ Auth::user()->name }}</div>
                        @else
                            <div class="small fw-light">สมาชิก</div>
                        @endauth
                    </a>

                    {{-- Dropdown Menu สำหรับผู้ใช้ที่ล็อกอินแล้วเท่านั้น --}}
                    {{-- จะแสดงก็ต่อเมื่อผู้ใช้ล็อกอินอยู่ และถูกควบคุมโดย data-bs-toggle="dropdown" ข้างบน --}}
                    @auth
                        <ul class="dropdown-menu dropdown-menu-end text-center p-2" aria-labelledby="dropdownUserMenu">
                            <li><a class="dropdown-item fw-small" href="#">บัญชีของฉัน</a></li>
                            <li><a class="dropdown-item fw-small" href="#">ประวัติคำสั่งซื้อ</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item fw-small" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    ออกจากระบบ
                                </a>
                            </li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endauth

                    {{-- ส่วน Modal สำหรับผู้เยี่ยมชม (Guest) --}}
                    {{-- โค้ด Modal นี้จะยังคงอยู่ในตำแหน่งเดิมที่คุณวางไว้ --}}
                    @guest
                        <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 shadow-sm animate__animated animate__fadeIn">
                                    <div class="modal-body p-4 bg-light ">
                                        <ul class="nav nav-tabs mb-3 justify-content-center" id="authTabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab"
                                                    href="#loginTab">ลงชื่อเข้าใช้</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-bs-toggle="tab"
                                                    href="#registerTab">ลงทะเบียน</a>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="loginTab">
                                                <form method="POST" action="{{ route('login') }}">
                                                    @csrf

                                                    <div class="mb-3">
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="อีเมล*" required value="{{ old('email') }}">
                                                    </div>

                                                    <div class="mb-3">
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="รหัสผ่าน*" required>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary w-25">เข้าสู่ระบบ</button>

                                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                                        <div class="form-check small">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="remember" id="rememberLogin"
                                                                {{ old('remember') ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="rememberLogin">จดจำรหัส</label>
                                                        </div>

                                                        <a href="#forgotTab" id="forgot-tab" class="small text-muted"
                                                            data-bs-toggle="tab" data-bs-target="#forgotTab"
                                                            role="tab" aria-controls="forgotTab"
                                                            aria-selected="false">
                                                            ลืมรหัสผ่าน?
                                                        </a>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="forgotTab" role="tabpanel"
                                                aria-labelledby="forgot-tab">
                                                <form method="POST" action="{{ route('password.email') }}">
                                                    @csrf
                                                    <h2>ลืมรหัสผ่าน</h2>
                                                    <p>กรุณากรอกอีเมลของท่านเพื่อรับรหัสผ่านใหม่</p>
                                                    <div class="mb-3">
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="อีเมลที่ลงทะเบียน*" required>
                                                    </div>
                                                    <button type="submit"
                                                        class="btn btn-warning w-25">ส่งลิงก์รีเซ็ต</button>
                                                    <div class="mt-3">
                                                        <a href="#loginTab" class="small text-muted" data-bs-toggle="tab"
                                                            data-bs-target="#loginTab">ย้อนกลับไปล็อกอิน</a>
                                                    </div>
                                                </form>
                                            </div>

                                            <div class="tab-pane fade" id="registerTab">
                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf
                                                    <div class="mb-2">
                                                        <input type="text" name="name" class="form-control"
                                                            placeholder="ชื่อผู้ใช้*" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <input type="email" name="email" class="form-control"
                                                            placeholder="อีเมล*" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <input type="password" name="password" class="form-control"
                                                            placeholder="รหัสผ่าน*" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <input type="password" name="password_confirmation"
                                                            class="form-control" placeholder="ยืนยันรหัสผ่าน*" required>
                                                    </div>
                                                    <div class="mb-2">
                                                        <input type="text" name="phone" class="form-control"
                                                            placeholder="หมายเลขโทรศัพท์*" required>
                                                    </div>

                                                    <div class="mb-2">
                                                        <select class="form-select" name="gender" required>
                                                            <option value="" disabled selected>กรุณาเลือกเพศ</option>
                                                            <option value="ชาย">ชาย</option>
                                                            <option value="หญิง">หญิง</option>
                                                            <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <select class="form-select" name="occupation" required>
                                                            <option value="" disabled selected>กรุณาเลือกอาชีพ
                                                            </option>
                                                            <option value="ครู">ครู</option>
                                                            <option value="นักเรียน">นักเรียน</option>
                                                            <option value="ผู้ปกครอง">ผู้ปกครอง</option>
                                                            <option value="เจ้าหน้าที่รัฐ">เจ้าหน้าที่รัฐ</option>
                                                            <option value="โรงเรียน/หน่วยงานรัฐ">โรงเรียน/หน่วยงานรัฐ
                                                            </option>
                                                            <option value="ร้านค้า/บริษัท">ร้านค้า/บริษัท</option>
                                                            <option value="อื่นๆ">อื่นๆ</option>
                                                        </select>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-pink w-40">ลงทะเบียนสมาชิก</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg py-1  " style="background-color: #ff40a4;" id="mainNavbar">
            <div class="container">
                <div class="collapse navbar-collapse show">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">

                        {{-- ปุ่ม Hamburger --}}

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarMenu">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="nav-link  text-white fw-normal px-3">แนะนำ</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/products') }}"
                                    class="nav-link  text-white fw-normal px-3">สินค้า</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ request()->routeIs('home') ? '#bookSection' : url('/') . '#bookSection' }}"
                                    class="nav-link  text-white fw-normal px-3">หนังสือ</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ request()->routeIs('home') ? '#sciSection' : url('/') . '#sciSection' }}"
                                    class="nav-link  text-white fw-normal px-2">อุปกรณ์วิทย์</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ request()->routeIs('home') ? '#cheSection' : url('/') . '#cheSection' }}"
                                    class="nav-link  text-white fw-normal px-2">สารเคมี</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ request()->routeIs('home') ? '#droneSection' : url('/') . '#droneSection' }}"
                                    class="nav-link  text-white fw-normal px-2">โดรน</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/orders/history') }}"
                                    class="nav-link  text-white fw-normal px-2">ประวัติคำสั่งซื้อ</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('/book-exam') }}"
                                    class="nav-link  text-white fw-normal px-2">จองสอบภาษาจีน</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle text-white fw-normal px-2" href="#"
                                    id="moreDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    เพิ่มเติม
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/about') }}">เกี่ยวกับเรา</a>
                                    </li>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item"
                                            href="{{ url('/customer/gdpr') }}">นโยบายความเป็นส่วนตัว</a>
                                    </li>
                                </ul>
                            </li>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>

        <nav class="navbar navbar-expand-lg py-1 sticky-navbar" id="stickyNavbar">
            <div class="container">
                <div class="collapse navbar-collapse show" id="stickyNavbarMenu">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 gap-2">
                        <li class="nav-item">
                            <a href="{{ url('/') }}" class="nav-link text-white fw-normal px-3">แนะนำ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/products') }}" class="nav-link text-white fw-normal px-3">สินค้า</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ request()->routeIs('home') ? '#bookSection' : url('/') . '#bookSection' }}"
                                class="nav-link text-white fw-normal px-3">หนังสือ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ request()->routeIs('home') ? '#sciSection' : url('/') . '#sciSection' }}"
                                class="nav-link text-white fw-normal px-2">อุปกรณ์วิทย์</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ request()->routeIs('home') ? '#cheSection' : url('/') . '#cheSection' }}"
                                class="nav-link text-white fw-normal px-2">สารเคมี</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ request()->routeIs('home') ? '#droneSection' : url('/') . '#droneSection' }}"
                                class="nav-link text-white fw-normal px-2">โดรน</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/orders/history') }}"
                                class="nav-link text-white fw-normal px-2">ประวัติคำสั่งซื้อ</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/book-exam') }}"
                                class="nav-link text-white fw-normal px-2">จองสอบภาษาจีน</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white fw-normal px-2" href="#"
                                id="moreDropdownSticky" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                เพิ่มเติม
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreDropdownSticky">
                                <li><a class="dropdown-item" href="{{ url('/about') }}">เกี่ยวกับเรา</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item"
                                        href="{{ url('/customer/gdpr') }}">นโยบายความเป็นส่วนตัว</a></li>
                            </ul>
                        </li>
                    </ul>

                    <div class="d-flex align-items-end gap-4 ms-auto text-white">
                        <div class="text-center">
                            <a href="#" class="link-icon text-decoration-none text-white"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="position-relative">
                                    <svg class="mb-icon" xmlns="http://www.w3.org/2000/svg" width="28"
                                        height="28" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5
                                            2 5.42 4.42 3 7.5 3c1.74 0 3.41 0.81 4.5 2.09
                                            C13.09 3.81 14.76 3 16.5 3
                                            19.58 3 22 5.42 22 8.5
                                            c0 3.78-3.4 6.86-8.55 11.54L12 21.35z" />
                                    </svg>
                                    @php $wishlistIds = session('wishlist', []); @endphp
                                    @if (count($wishlistIds) > 0)
                                        <span class="counter qty">{{ count($wishlistIds) }}</span>
                                    @endif
                                </div>
                                <div class="small fw-light text-white">รายการโปรด</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                                <h6 class="fw-bold">รายการโปรดของคุณ</h6>
                                <hr class="mt-1 mb-2">
                                @php
                                    $wishlistIds = session()->get('wishlist', []);
                                    $allProducts = \App\Models\Product::whereIn('id', $wishlistIds)->get()->keyBy('id');
                                    $wishlistItems = collect($wishlistIds)
                                        ->map(fn($id) => $allProducts->get($id))
                                        ->filter();
                                @endphp

                                @if (count($wishlistItems))
                                    @foreach ($wishlistItems as $item)
                                        <div class="d-flex mb-2 small">
                                            <img src="{{ asset($item['image']) }}" alt=""
                                                style="width:40px; height:40px; object-fit:cover; margin-right: 0.5rem;">
                                            <div class="flex-grow-1" style="max-width: 250px">
                                                <div class="text-black fw-semibold">{{ $item['title'] }}</div>
                                                <div class="text-pink">฿{{ number_format($item['price'], 2) }}</div>
                                                <form action="{{ route('wishlist.remove') }}" method="POST"
                                                    class="mt-1">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $item['id'] }}">
                                                    <button type="submit" class="btn btn-sm btn-outline-danger">
                                                        <i class="bi bi-trash-fill"></i> ลบ
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    @endforeach

                                    <div class="text-center">
                                        <a href="{{ route('wishlist.view') }}" class="btn btn-primary w-100">
                                            ดูรายการโปรดทั้งหมด
                                        </a>
                                    </div>
                                @else
                                    <div class=" text-muted small">
                                        คุณไม่มีสินค้าในรายการโปรด.
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="text-center position-relative">
                            <a href="{{ url('/cart') }}" class="link-icon text-decoration-none text-white"
                                data-bs-toggle="dropdown">
                                <svg class="mb-icon" xmlns="http://www.w3.org/2000/svg" width="28"
                                    height="28" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10
                                        0c-1.1 0-1.99.9-1.99 2S15.9 22 17
                                        22s2-.9 2-2-.9-2-2-2zM7.2 14h9.45c.75 0
                                        1.41-.41 1.75-1.03l3.58-6.49A1
                                        1 0 0 0 21 5H5.21L4.27 3H1v2h2l3.6
                                        7.59-1.35 2.44C4.52 15.37 5.48
                                        17 7 17h12v-2H7.42c-.14
                                        0-.25-.11-.25-.25l.03-.12L7.2 14z" />
                                </svg>
                                @php $cart = session('cart', []); @endphp
                                @if (count($cart) > 0)
                                    <span class="counter qty">{{ count($cart) }}</span>
                                @endif
                                <div class="small fw-light text-white">ตะกร้าสินค้า</div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                                <h6 class="fw-bold">รายการสินค้าของคุณ</h6>
                                <hr class="mt-1 mb-2">

                                @php
                                    $cart = session('cart', []);
                                    $totalAmount = 0;
                                    foreach ($cart as $productId => $item) {
                                        $totalAmount += $item['price'] * $item['qty'];
                                    }
                                @endphp

                                @if (count($cart))
                                    @foreach ($cart as $productId => $item)
                                        @php
                                            $subtotal = $item['price'] * $item['qty'];
                                        @endphp
                                        <div class="d-flex mb-2 small">
                                            <img src="{{ asset($item['img']) }}" alt=""
                                                style="width:40px; height:40px; object-fit:cover; margin-right: 0.5rem;">
                                            <div class="text-black flex-grow-1">
                                                <div class="fw-semibold">{{ $item['title'] }}</div>
                                                <div class="fw-small">
                                                    จำนวน: {{ $item['qty'] }} ×
                                                    ฿{{ number_format($item['price'], 2) }}
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                <span
                                                    class="text-pink fw-bold">฿{{ number_format($subtotal, 2) }}</span>
                                            </div>
                                        </div>
                                        <hr class="my-1">
                                    @endforeach

                                    <div class="d-flex justify-content-between align-items-center mt-2 mb-3">
                                        <div class="fw-semibold">รวมทั้งหมด:</div>
                                        <div class="text-danger fw-bold">฿{{ number_format($totalAmount, 2) }}</div>
                                    </div>

                                    <div class="d-grid">
                                        <a href="{{ route('cart.view') }}" class="btn btn-primary w-100 mb-2">
                                            ดูตะกร้าทั้งหมด
                                        </a>
                                    </div>
                                @else
                                    <div class="text-center text-muted small">
                                        คุณไม่มีสินค้าในตะกร้า.
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="text-center">
                            <a class="link-icon text-decoration-none text-white" href="#" role="button"
                                id="dropdownUserMenu" {{-- ถ้าเป็น Guest ให้เปิด Modal --}}
                                @guest
data-bs-toggle="modal" data-bs-target="#authModal" @endguest
                                @auth
data-bs-toggle="dropdown" aria-expanded="false" @endauth>
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    fill="currentColor" viewBox="0 0 16 16" class="mb-icon">
                                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3z" />
                                    <path fill-rule="evenodd" d="M8 8a3 3 0 100-6 3 3 0 000 6z" />
                                </svg>

                                @auth
                                    <div class="small fw-light">สวัสดี, {{ Auth::user()->name }}</div>
                                @else
                                    <div class="small fw-light">สมาชิก</div>
                                @endauth
                            </a>

                            @auth
                                <ul class="dropdown-menu dropdown-menu-end text-center p-2"
                                    aria-labelledby="dropdownUserMenu">
                                    <li><a class="dropdown-item fw-small" href="#">บัญชีของฉัน</a></li>
                                    <li><a class="dropdown-item fw-small" href="#">ประวัติคำสั่งซื้อ</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li>
                                        <a class="dropdown-item fw-small" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            ออกจากระบบ
                                        </a>
                                    </li>
                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            @endauth

                            @guest
                                <div class="modal fade" id="authModal" tabindex="-1" aria-labelledby="authModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content rounded-4 shadow-sm animate__animated animate__fadeIn">
                                            <div class="modal-body p-4 bg-light ">
                                                <ul class="nav nav-tabs mb-3 justify-content-center" id="authTabs">
                                                    <li class="nav-item">
                                                        <a class="nav-link active" data-bs-toggle="tab"
                                                            href="#loginTab">ลงชื่อเข้าใช้</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" data-bs-toggle="tab"
                                                            href="#registerTab">ลงทะเบียน</a>
                                                    </li>
                                                </ul>

                                                <div class="tab-content">
                                                    <div class="tab-pane fade show active" id="loginTab">
                                                        <form method="POST" action="{{ route('login') }}">
                                                            @csrf

                                                            {{-- START: ส่วนที่เพิ่มเข้ามาสำหรับแสดงข้อผิดพลาด (ปรับปรุง) --}}
                                                            {{-- แสดงข้อความรวมเมื่อมี error เกี่ยวกับการ login --}}
                                                            @if ($errors->has('email') || $errors->has('password'))
                                                                <div class="alert alert-danger mb-3" role="alert">
                                                                    อีเมลหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง
                                                                </div>
                                                            @elseif (session('status'))
                                                                {{-- หากมี session status (อาจเป็น success หรือ error อื่นๆ) --}}
                                                                <div class="alert alert-{{ Str::contains(session('status'), ['error', 'failed']) ? 'danger' : 'success' }} mb-3"
                                                                    role="alert">
                                                                    {{ session('status') }}
                                                                </div>
                                                            @endif
                                                            {{-- END: ส่วนที่เพิ่มเข้ามาสำหรับแสดงข้อผิดพลาด --}}

                                                            <div class="mb-3">
                                                                <input type="email" name="email"
                                                                    class="form-control @error('email') is-invalid @enderror"
                                                                    placeholder="อีเมล*" required
                                                                    value="{{ old('email') }}">
                                                                @error('email')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <div class="mb-3">
                                                                <input type="password" name="password"
                                                                    class="form-control @error('password') is-invalid @enderror"
                                                                    placeholder="รหัสผ่าน*" required>
                                                                @error('password')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>

                                                            <button type="submit"
                                                                class="btn btn-primary w-25">เข้าสู่ระบบ</button>

                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-3">
                                                                <div class="form-check small">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        name="remember" id="rememberLogin"
                                                                        {{ old('remember') ? 'checked' : '' }}>
                                                                    <label class="form-check-label"
                                                                        for="rememberLogin">จดจำรหัส</label>
                                                                </div>

                                                                <a href="#forgotTab" id="forgot-tab"
                                                                    class="small text-muted" data-bs-toggle="tab"
                                                                    data-bs-target="#forgotTab" role="tab"
                                                                    aria-controls="forgotTab" aria-selected="false">
                                                                    ลืมรหัสผ่าน?
                                                                </a>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="forgotTab" role="tabpanel"
                                                        aria-labelledby="forgot-tab">
                                                        <form method="POST" action="{{ route('password.email') }}">
                                                            @csrf
                                                            <h2>ลืมรหัสผ่าน</h2>
                                                            <p>กรุณากรอกอีเมลของท่านเพื่อรับรหัสผ่านใหม่</p>
                                                            <div class="mb-3">
                                                                <input type="email" name="email" class="form-control"
                                                                    placeholder="อีเมลที่ลงทะเบียน*" required>
                                                            </div>
                                                            <button type="submit"
                                                                class="btn btn-warning w-25">ส่งลิงก์รีเซ็ต</button>
                                                            <div class="mt-3">
                                                                <a href="#loginTab" class="small text-muted"
                                                                    data-bs-toggle="tab"
                                                                    data-bs-target="#loginTab">ย้อนกลับไปล็อกอิน</a>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="tab-pane fade" id="registerTab">
                                                        <form method="POST" action="{{ route('register') }}">
                                                            @csrf
                                                            <div class="mb-2">
                                                                <input type="text" name="name" class="form-control"
                                                                    placeholder="ชื่อผู้ใช้*" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <input type="email" name="email" class="form-control"
                                                                    placeholder="อีเมล*" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <input type="password" name="password"
                                                                    class="form-control" placeholder="รหัสผ่าน*" required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <input type="password" name="password_confirmation"
                                                                    class="form-control" placeholder="ยืนยันรหัสผ่าน*"
                                                                    required>
                                                            </div>
                                                            <div class="mb-2">
                                                                <input type="text" name="phone" class="form-control"
                                                                    placeholder="หมายเลขโทรศัพท์*" required>
                                                            </div>

                                                            <div class="mb-2">
                                                                <select class="form-select" name="gender" required>
                                                                    <option value="" disabled selected>กรุณาเลือกเพศ
                                                                    </option>
                                                                    <option value="ชาย">ชาย</option>
                                                                    <option value="หญิง">หญิง</option>
                                                                    <option value="ไม่ระบุ">ไม่ระบุ</option>
                                                                </select>
                                                            </div>

                                                            <div class="mb-3">
                                                                <select class="form-select" name="occupation" required>
                                                                    <option value="" disabled selected>
                                                                        กรุณาเลือกอาชีพ</option>
                                                                    <option value="ครู">ครู</option>
                                                                    <option value="นักเรียน">นักเรียน</option>
                                                                    <option value="ผู้ปกครอง">ผู้ปกครอง</option>
                                                                    <option value="เจ้าหน้าที่รัฐ">เจ้าหน้าที่รัฐ</option>
                                                                    <option value="โรงเรียน/หน่วยงานรัฐ">
                                                                        โรงเรียน/หน่วยงานรัฐ</option>
                                                                    <option value="ร้านค้า/บริษัท">ร้านค้า/บริษัท</option>
                                                                    <option value="อื่นๆ">อื่นๆ</option>
                                                                </select>
                                                            </div>

                                                            <button type="submit"
                                                                class="btn btn-pink w-40">ลงทะเบียนสมาชิก</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        // ตรวจสอบว่ามี error จากการ Login หรือไม่
                                        const hasLoginError = @json($errors->has('email') || $errors->has('password'));
                                        const sessionStatus = @json(session('status')); // ดึง session status มาด้วย

                                        // ถ้ามี error จาก login หรือ session status ที่เป็น error
                                        if (hasLoginError || (sessionStatus && (sessionStatus.includes('error') || sessionStatus.includes(
                                                'failed')))) {
                                            const authModalElement = document.getElementById('authModal');
                                            if (authModalElement) {
                                                const authModal = new bootstrap.Modal(authModalElement);
                                                authModal.show(); // เปิด Modal

                                                // ตรวจสอบให้แน่ใจว่าแท็บ Login ถูกเปิดใช้งาน
                                                const loginTabTrigger = document.querySelector('#authTabs a[href="#loginTab"]');
                                                if (loginTabTrigger) {
                                                    const tab = new bootstrap.Tab(loginTabTrigger);
                                                    tab.show();
                                                }
                                            }
                                        }
                                    });
                                </script>
                            @endguest
                        </div>

                    </div>
                </div>
            </div>
        </nav>



        @yield('content')



        <footer class="site-footer bg-pink text-white pt-5 pb-3 mt-5 ">
            <div class="container">
                <div class="row ms-5">
                    <!-- Column 1: Main menu -->
                    <div class="col-12 col-md-4 mb-4 mb-md-0 ">
                        <ul class="list-unstyled footer-menu">
                            <li><a href="#" class="text-white">หน้าหลัก</a></li>
                            <li><a href="/products" class="text-white">สินค้า</a></li>
                            <li><a href="{{ request()->routeIs('home') ? '#bookSection' : url('/') . '#bookSection' }}"
                                    class="text-white">หนังสือ</a></li>
                            <li><a href="{{ request()->routeIs('home') ? '#sciSection' : url('/') . '#sciSection' }}"
                                    class="text-white">อุปกรณ์วิทยาศาสตร์</a></li>
                            <li><a href="{{ request()->routeIs('home') ? '#cheSection' : url('/') . '#cheSection' }}"
                                    class="text-white">สารเคมี</a></li>
                            <li><a href="{{ request()->routeIs('home') ? '#droneSection' : url('/') . '#droneSection' }}"
                                    class="text-white">โดรน</a></li>
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

        <button id="backToTop" title="Go to top" aria-label="Back to top">
            &#8593;
        </button>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        {{-- swiper --}}
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const pre = document.getElementById('preloader');
            if (!pre) return;
            pre.classList.add('loaded');
            setTimeout(() => pre.remove(), 2000);
        });
    </script>


</body>

</html>
