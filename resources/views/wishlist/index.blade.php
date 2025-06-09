@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')
    <div class="container py-4">
        <h2 class="mb-4">รายการโปรดของคุณ</h2>

        <div class="row align-items-start ">
            <div class="row row-grid">

                {{-- เมนูด้านซ้าย --}}
                 <div class=" sidebar">
                    <a href="/customer/account">บัญชีของฉัน</a>
                    <a href="/orders/sale">คำสั่งซื้อของคุณ</a>
                    <a href="/wishlist"class="fw-bold text-pink">รายการโปรดของคุณ</a>
                    <a href="/customer/address">ข้อมูลที่อยู่จัดส่ง</a>
                    <a href="/orders/history">ประวัติคำสั่งซื้อ</a>
                    <a href="/billing/account">ยืนยันการชำระเงิน</a>
                    <a href="/customer/gdpr">นโยบายความเป็นส่วนตัว</a>
                </div>
            </div>
          
            <div class="product-grid wishlist md-2  ">
                @php
                    // ตัวแปร $items มาจาก ShopController::viewWishlist()
                    // ซึ่งเป็น array ของสินค้าที่อยู่ใน wishlist
                    $items = $items ?? [];
                @endphp

                @if (count($items))
                    <div class="row g-3 justify-content-start  align-items-center ">
                        @foreach ($items as $item)
                            <div class="row col-12 col-md-4 col-lg-4 justify-content-center mt-5 mb-5">
                                <div class="card h-75 w-75 shadow-sm">
                                    <img src="{{ asset($item['img']) }}" class="card-img-top" alt="{{ $item['title'] }}"
                                        style="height: 200px; object-fit: cover; width:200px; margin:0 auto">
                                    <div class="card-body d-flex flex-column">
                                        <h6 class="card-title">{!! nl2br(e($item['title'])) !!}</h6>
                                        <p class="text-pink fw-bold mb-3">฿{{ number_format($item['price'], 2) }}</p>

                                        <div class=" mt-auto">
                                            <a href="{{ route('shop.show', $item['id']) }}"
                                                class="btn btn-outline-secondary btn-sm w-100 mb-2">
                                                ดูรายละเอียด
                                            </a>

                                            <form action="{{ route('wishlist.remove') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                                <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                                                    <i class="bi bi-trash-fill me-1"></i> ลบออก
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-secondary text-center pt-4 mt-4 ">
                        คุณยังไม่มีสินค้าในรายการโปรด.
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
