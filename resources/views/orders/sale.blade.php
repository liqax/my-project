@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')
    <div class="container py-4">
        {{-- หัวข้อ --}}
        <h2 class="mb-4">คำสั่งซื้อของคุณ</h2>
        <div class="row align-items-start ">
            <div class="row row-grid">

                {{-- เมนูด้านซ้าย --}}
                <div class=" sidebar ">
                    <a href="/customer/account">บัญชีของฉัน</a>
                    <a href="/orders/sale"class="fw-bold text-pink">คำสั่งซื้อของคุณ</a>
                    <a href="/wishlist">รายการโปรดของคุณ</a>
                    <a href="/customer/address">ข้อมูลที่อยู่จัดส่ง</a>
                    <a href="/orders/history">ประวัติคำสั่งซื้อ</a>
                    <a href="/billing/account">ยืนยันการชำระเงิน</a>
                    <a href="/customer/gdpr">นโยบายความเป็นส่วนตัว</a>
                </div>
            </div>

            <div class="product-grid wishlist md-2  ">
                {{-- resources/views/orders/index.blade.php --}}

                    




            </div>
        </div>
    </div>
@endsection
