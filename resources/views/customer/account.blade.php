@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')

    <div class="container py-4">
        {{-- หัวข้อ --}}
        <h2 class="mb-4">บัญชีของฉัน</h2>
        <div class="row align-items-start ">
            <div class="row row-grid">

                {{-- เมนูด้านซ้าย --}}
                <div class=" sidebar ">
                    <a href="/customer/account"class="fw-bold text-pink">บัญชีของฉัน</a>
                    <a href="/orders/sale">คำสั่งซื้อของคุณ</a>
                    <a href="/wishlist">รายการโปรดของคุณ</a>
                    <a href="/customer/address">ข้อมูลที่อยู่จัดส่ง</a>
                    <a href="/orders/history">ประวัติคำสั่งซื้อ</a>
                    <a href="/billing/account">ยืนยันการชำระเงิน</a>
                    <a href="/customer/gdpr">นโยบายความเป็นส่วนตัว</a>
                </div>
            </div>

            <div class="product-grid wishlist md-2">
                <div class="account-section container my-4">
                    <!-- ข้อมูลบัญชี -->
                    <div class="account-card mb-4">
                        <div class="account-card-header">
                            <h5>ข้อมูลบัญชี</h5>
                        </div>
                        <div class="account-card-body d-flex justify-content-between flex-wrap">
                            <div>
                                <p class="fw-semibold mb-1">ข้อมูลติดต่อ</p>
                                @auth
                                    {{-- ส่วนนี้จะแสดงก็ต่อเมื่อผู้ใช้ล็อกอินแล้ว --}}
                                    <p>{{ Auth::user()->name }}<br>{{ Auth::user()->email }}</p>
                                    <a href="{{ url('/change-password') }}">เปลี่ยนรหัสผ่าน</a>
                                @else
                                    {{-- ส่วนนี้จะแสดงก็ต่อเมื่อผู้ใช้ยังไม่ได้ล็อกอิน --}}
                                    <p>โปรด <a href="/">เข้าสู่ระบบ</a> เพื่อดูข้อมูลส่วนตัวของคุณ</p>
                                    
                                @endauth
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">จดหมายข่าว</p>
                                <p>ติดตามรับข่าวสารได้จาก "การสมัครติดตามข่าว"</p>
                            </div>
                        </div>
                    </div>

                    <!-- ข้อมูลที่อยู่ -->
                    <div class="account-card mb-4">
                        <div class="account-card-header d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">ข้อมูลที่อยู่จัดส่งสินค้า</h5>
                            <a href="{{ route('address.edit') }}" class="btn btn-outline-dark btn-sm">
                                จัดการข้อมูลที่อยู่ <i class="bi bi-box-arrow-up-right ms-1"></i>
                            </a>
                        </div>
                        <div class="account-card-body d-flex justify-content-between flex-wrap">
                            <div>
                                <p class="fw-semibold mb-1">ที่อยู่เริ่มต้นสำหรับออกใบเสร็จ</p>
                                <p class="text-muted">{{ $billingAddress->address ?? 'คุณไม่ได้ตั้งค่าที่อยู่ในใบเสร็จ' }}
                                </p>
                            </div>
                            <div>
                                <p class="fw-semibold mb-1">ที่อยู่จัดส่งสินค้า</p>
                                <p class="text-muted">
                                    {{ $shippingAddress->address ?? 'คุณไม่ได้ตั้งค่าที่อยู่จัดส่งสินค้า' }}</p>
                                <a href="{{ route('address.edit') }}"
                                    class="text-primary small">แก้ไขที่อยู่จัดส่งสินค้า</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
