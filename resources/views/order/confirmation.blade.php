@extends('layouts.app')
@section('title', 'ยืนยันคำสั่งซื้อ')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg rounded-4 p-5">
                <div class="text-center mb-4">
                    <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    <h3 class="mt-3 fw-bold text-success">คำสั่งซื้อของคุณได้รับการยืนยันแล้ว!</h3>
                    <p class="lead text-muted">ขอบคุณสำหรับการสั่งซื้อสินค้ากับเราค่ะ</p>
                </div>

                <hr class="my-4">

                <div class="row mb-4">
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-2">ข้อมูลคำสั่งซื้อ</h5>
                        <p class="mb-1"><strong>เลขที่คำสั่งซื้อ:</strong> <span class="text-primary">{{ $order->order_number }}</span></p>
                        <p class="mb-1"><strong>วันที่สั่งซื้อ:</strong> {{ $order->created_at->format('d M Y, H:i') }}</p>
                        <p class="mb-1"><strong>ยอดรวมสุทธิ:</strong> <span class="fw-bold text-danger">฿{{ number_format($order->grand_total, 2) }}</span></p>
                        <p class="mb-1"><strong>ช่องทางการชำระเงิน:</strong> {{ $order->payment_method == 'bank_transfer' ? 'โอนเงินผ่านธนาคาร' : 'เก็บเงินปลายทาง (COD)' }}</p>
                        <p class="mb-0"><strong>สถานะ:</strong> <span class="badge bg-warning text-dark">{{ ucfirst($order->status) }}</span></p>
                    </div>
                    <div class="col-md-6 mt-3 mt-md-0">
                        <h5 class="fw-bold mb-2">ที่อยู่จัดส่ง</h5>
                        <p class="mb-1">{{ $order->shippingAddress->first_name }} {{ $order->shippingAddress->last_name }}</p>
                        <p class="mb-1">{{ $order->shippingAddress->address }}, {{ $order->shippingAddress->sub_district }}, {{ $order->shippingAddress->district }}</p>
                        <p class="mb-0">{{ $order->shippingAddress->province }} {{ $order->shippingAddress->zipcode }}</p>
                        <p class="mb-0">โทร: {{ $order->shippingAddress->phone }}</p>
                        @if($order->shippingAddress->company)
                        <p class="mb-0">บริษัท: {{ $order->shippingAddress->company }}</p>
                        @endif
                    </div>
                </div>

                <h5 class="fw-bold mb-3">รายละเอียดสินค้าในคำสั่งซื้อ</h5>
                <ul class="list-group mb-4">
                    @foreach ($order->orderItems as $item)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <div>
                                <img src="{{ asset($item->product->img ?? 'images/placeholder.png') }}" alt="{{ $item->product->title ?? 'สินค้า' }}" style="width: 50px; height: 50px; object-fit: cover;" class="me-2 rounded">
                                <strong>{{ $item->product->title ?? 'สินค้าไม่ทราบชื่อ' }}</strong>
                                @if($item->size) <small class="text-muted"> (ขนาด: {{ $item->size }})</small> @endif
                                <br>
                                <small class="text-muted">{{ $item->quantity }} x ฿{{ number_format($item->price, 2) }}</small>
                            </div>
                            <span class="fw-bold">฿{{ number_format($item->total, 2) }}</span>
                        </li>
                    @endforeach
                    <li class="list-group-item d-flex justify-content-between">
                        <span>ค่าจัดส่ง:</span>
                        <span class="fw-bold">฿{{ number_format($order->shipping_cost, 2) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>VAT (7%):</span>
                        <span class="fw-bold">฿{{ number_format($order->vat_amount, 2) }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between bg-light fw-bold">
                        <span>รวมทั้งสิ้น:</span>
                        <span class="text-danger">฿{{ number_format($order->grand_total, 2) }}</span>
                    </li>
                </ul>

                @if ($order->payment_method == 'bank_transfer')
                    <div class="alert alert-info text-center mt-4">
                        <h5 class="fw-bold">ข้อมูลการโอนเงิน</h5>
                        <p class="mb-1">กรุณาโอนเงินจำนวน <strong class="text-danger">฿{{ number_format($order->grand_total, 2) }}</strong> ไปยังบัญชีดังต่อไปนี้:</p>
                        <p class="mb-1"><strong>ธนาคาร:</strong> ธนาคารตัวอย่าง จำกัด (มหาชน)</p>
                        <p class="mb-1"><strong>เลขที่บัญชี:</strong> 123-4-56789-0</p>
                        <p class="mb-1"><strong>ชื่อบัญชี:</strong> บริษัท ร้านค้าออนไลน์ จำกัด</p>
                        <p class="mt-3 mb-0">หลังจากโอนเงินแล้ว กรุณาแจ้งหลักฐานการโอนเงินได้ที่ <a href="#">หน้าแจ้งชำระเงิน</a> หรือติดต่อเราที่ 081-234-5678</p>
                    </div>
                @endif

                <div class="text-center mt-4">
                    <a href="{{ route('home') }}" class="btn btn-outline-primary me-2">กลับหน้าหลัก</a>
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-primary">ดูสถานะคำสั่งซื้อ</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // ลบข้อมูลสินค้าที่เลือกออกจาก localStorage หลังจากสร้างคำสั่งซื้อสำเร็จแล้ว
        // เพื่อให้ตะกร้าสินค้าว่างเมื่อกลับมา
        localStorage.removeItem('selectedCartItems');
    });
</script>
@endsection