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
                <div class="order-card container my-4 p-4 border rounded shadow-sm">
                    <div class="row">
                        <!-- Left: รูป -->
                        <div class="col-md-3 text-center">
                            <img src="{{ asset('images/flower.png') }}" alt="order success" class="img-fluid"
                                style="max-height: 150px;">
                        </div>

                        <!-- Right: รายละเอียดลูกค้า -->
                        {{-- <div class="col-md-9">
                            <h4 class="mb-3">คำสั่งซื้อสำเร็จ</h4>
                            <p><strong>รหัสคำสั่งซื้อ:</strong> {{ $order->order_number }}</p>
                            <p><strong>ชื่อ-นามสกุล:</strong> {{ $order->customer_name }}</p>
                            <p><strong>เบอร์โทรศัพท์:</strong> {{ $order->phone }}</p>
                            <p><strong>อีเมล:</strong> {{ $order->email }}</p>
                            <p><strong>ที่อยู่จัดส่ง:</strong> {{ $order->shipping_address }}</p>
                        </div>
                    </div> --}}

                    <!-- เส้นขั้นตอนสถานะ -->
                    {{-- <div class="order-status my-4">
                        <div class="status-step {{ $order->status >= 1 ? 'active' : '' }}">
                            <img src="{{ asset('img/icons/step1.png') }}" alt="ยืนยันคำสั่งซื้อ">
                            <p>ยืนยันคำสั่งซื้อ</p>
                        </div>
                        <div class="status-step {{ $order->status >= 2 ? 'active' : '' }}">
                            <img src="{{ asset('img/icons/step2.png') }}" alt="ชำระเงินเรียบร้อย">
                            <p>ชำระเงินเรียบร้อย</p>
                        </div>
                        <div class="status-step {{ $order->status >= 3 ? 'active' : '' }}">
                            <img src="{{ asset('img/icons/step3.png') }}" alt="กำลังจัดเตรียม">
                            <p>กำลังจัดเตรียม</p>
                        </div>
                        <div class="status-step {{ $order->status >= 4 ? 'active' : '' }}">
                            <img src="{{ asset('img/icons/step4.png') }}" alt="ดำเนินการจัดส่ง">
                            <p>ดำเนินการจัดส่ง</p>
                        </div>
                        <div class="status-step {{ $order->status >= 5 ? 'active' : '' }}">
                            <img src="{{ asset('img/icons/step5.png') }}" alt="ลูกค้าได้รับสินค้า">
                            <p>ลูกค้าได้รับสินค้า</p>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
