<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'PRE-ORDER')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />

</head>

<body>

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
                        <img src="{{ asset('img/heart.svg') }}" alt="like" class="mb-icon" >
                        @php $wishlistIds = session('wishlist', []); @endphp
                        <div class="small fw-light">รายการโปรด ({{ count($wishlistIds) }})</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end p-3" style="min-width: 300px;">
                        <h6 class="fw-bold">รายการโปรดของคุณ</h6>
                        <hr class="mt-1 mb-2">
                        @php
                            // ดึงข้อมูลสินค้าที่อยู่ใน wishlist จาก session
                            $allProducts = (new \App\Http\Controllers\ShopController())->products();
                            $wishlistItems = collect($wishlistIds)
                                ->map(
                                    fn($i) => $allProducts->has($i)
                                        ? array_merge($allProducts->get($i), ['id' => $i])
                                        : null,
                                )
                                ->filter()
                                ->all();
                        @endphp

                        @if (count($wishlistItems))


                            @foreach ($wishlistItems as $item)
                                <div class="mb-2 small">
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
                                <hr class="my-2">
                            @endforeach

                            <div class="text-center">
                                <a href="{{ route('wishlist.view') }}" class="btn btn-sm btn-dark w-100">
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

                <div class="text-center">
                    <a href="{{ url('/cart') }}" class="link-icon text-decoration-none"data-bs-toggle="dropdown">
                        <img src="{{ asset('img/shopping-cart.svg') }}" alt="cart" class="mb-icon">
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
                                    {{-- (ถ้ามีรูปสินค้า อยากโชว์ ให้เพิ่ม <img> ตรงนี้) --}}
                                    {{-- <img src="{{ asset($item['img']) }}" alt="" style="width:40px; height:40px; object-fit:cover; margin-right: 0.5rem;"> --}}

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
                                <a href="{{ route('cart.view') }}" class="btn btn-sm btn-dark w-100 mb-2">
                                    ดูตะกร้าทั้งหมด
                                </a>
                                {{-- ปุ่มชำระสินค้าต่อ (checkout) --}}
                                <a href="{{ route('checkout.page') }}" class="btn btn-sm btn-primary w-100">
                                    ไปชำระสินค้า
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
                    <a href="{{ url('/login') }}" class="link-icon text-decoration-none">
                        <img src="{{ asset('img/user.svg') }}" alt="user" class="mb-icon">
                        <div class="small fw-light">สมาชิก</div>
                    </a>
                </div>
            </div>

        </div>


        <nav class="navbar navbar-expand-lg py-1" style="background-color: #ff40a4;" id="mainNavbar">
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
                                    class="nav-link  text-white fw-normal px-2">อุปกรณ์วิทยาศาสตร์</a>
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
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle text-white fw-normal px-2" href="#"
                                    id="moreDropdown" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    เพิ่มเติม
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="moreDropdown">
                                    <li><a class="dropdown-item" href="{{ url('/about') }}">เกี่ยวกับเรา</a></li>

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


        @yield('content')


        <footer class="site-footer bg-pink text-white pt-5 pb-3 mt-5">
            <div class="container">
                <div class="row">
                    <!-- Column 1: Main menu -->
                    <div class="col-12 col-md-4 mb-4 mb-md-0">
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



































        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>





    </div>




</body>

</html>
