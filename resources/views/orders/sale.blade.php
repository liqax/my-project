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
                @php
                    $orders = $orders ?? [];
                @endphp

                @if (count($orders))
                    <div class="row g-3 justify-content-start align-items-center">
                        @foreach ($orders as $order)
                            <div class="col-12 col-md-6 col-lg-4 mt-4">
                                <div class="card shadow-sm p-3">
                                    <h6 class="fw-bold mb-2">คำสั่งซื้อ: #{{ $order->id }}</h6>
                                    <p class="small mb-1">วันที่สั่งซื้อ: {{ $order->created_at->format('d/m/Y H:i') }}</p>
                                    <p class="small mb-3">รวมทั้งหมด: ฿{{ number_format($order->total, 2) }}</p>

                                    {{-- สถานะคำสั่งซื้อแบบไอคอน --}}
                                    <div class="d-flex justify-content-between text-center border-top pt-2">
                                        <div class="flex-fill">
                                            <i
                                                class="bi bi-cart-check-fill {{ $order->status == 'confirmed' ? 'text-pink' : 'text-muted' }}"></i>
                                            <div class="small">ยืนยันคำสั่งซื้อ</div>
                                        </div>
                                        <div class="flex-fill">
                                            <i
                                                class="bi bi-credit-card-fill {{ $order->status == 'paid' || $order->status == 'shipped' || $order->status == 'completed' ? 'text-pink' : 'text-muted' }}"></i>
                                            <div class="small">ชำระเรียบร้อย</div>
                                        </div>
                                        <div class="flex-fill">
                                            <i
                                                class="bi bi-truck {{ $order->status == 'shipped' || $order->status == 'completed' ? 'text-pink' : 'text-muted' }}"></i>
                                            <div class="small">กำลังจัดส่ง</div>
                                        </div>
                                        <div class="flex-fill">
                                            <i
                                                class="bi bi-check-circle-fill {{ $order->status == 'completed' ? 'text-pink' : 'text-muted' }}"></i>
                                            <div class="small">ได้รับสินค้า</div>
                                        </div>
                                    </div>

                                    {{-- ปุ่มดูรายละเอียดเพิ่มเติม --}}
                                    <div class="mt-3 text-end">
                                        <a href="{{ route('order.show', $order->id) }}"
                                            class="btn btn-sm btn-outline-secondary">ดูรายละเอียด</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-secondary text-center pt-4 mt-4">
                        คุณยังไม่มีคำสั่งซื้อ
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
