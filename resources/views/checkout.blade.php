@extends('layouts.app')
@section('title', 'PRE-ORDER')

@section('content')
  
@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row">

        <!-- ✅ ซ้าย: ส่วนจัดส่ง -->
        <div class="col-md-8">
            <h4 class="mb-3">📦 จัดส่งสินค้า</h4>

            <!-- วิธีจัดส่ง -->
            <div class="mb-3">
                <label class="form-label fw-bold">เลือกวิธีจัดส่ง:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery_method" value="home" checked>
                    <label class="form-check-label">จัดส่งถึงบ้าน</label>
                </div>
            </div>

            <!-- ปุ่มเพิ่มที่อยู่ -->
            <div class="mb-3">
                <a href="{{ route('address.create') }}" class="btn btn-outline-pink btn-sm">
                    ➕ เพิ่มที่อยู่จัดส่ง
                </a>
            </div>

            <!-- แสดงที่อยู่ที่บันทึกไว้ -->
            <div class="card mt-3">
                <div class="card-body">
                    <h6 class="fw-bold">📍 ที่อยู่ของคุณ</h6>
                    @if ($address)
                        <p class="mb-1">{{ $address->name }}</p>
                        <p class="mb-1">{{ $address->address_line }}</p>
                        <p class="mb-1">เบอร์โทร: {{ $address->phone }}</p>
                    @else
                        <p class="text-muted">ยังไม่มีที่อยู่ กรุณาเพิ่มที่อยู่จัดส่ง</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- ✅ ขวา: สรุปคำสั่งซื้อ -->
        <div class="col-md-4">
            <div class="card sticky-top shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">🧾 สรุปคำสั่งซื้อ</h5>

                    <!-- รายการสินค้า -->
                    <ul class="list-group mb-3">
                        @foreach ($cartItems as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <div>{{ $item->product->title }}</div>
                                    <small class="text-muted">x{{ $item->quantity }}</small>
                                </div>
                                <span>฿{{ number_format($item->product->price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>

                    <!-- โค้ดส่วนลด -->
                    <form method="POST" action="{{ route('checkout.applyCoupon') }}" class="mb-3">
                        @csrf
                        <label class="form-label">โค้ดส่วนลด</label>
                        <div class="input-group">
                            <input type="text" name="coupon_code" class="form-control" placeholder="กรอกโค้ด">
                            <button class="btn btn-outline-secondary" type="submit">ใช้</button>
                        </div>
                    </form>

                    <!-- สรุปยอด -->
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <span>ยอดรวม</span>
                            <strong>฿{{ number_format($total, 2) }}</strong>
                        </li>
                        @if ($discount > 0)
                        <li class="list-group-item d-flex justify-content-between text-success">
                            <span>ส่วนลด</span>
                            <strong>-฿{{ number_format($discount, 2) }}</strong>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between fw-bold">
                            <span>ยอดสุทธิ</span>
                            <strong>฿{{ number_format($total - $discount, 2) }}</strong>
                        </li>
                    </ul>

                    <!-- ปุ่มยืนยัน -->
                    <form method="POST" action="{{ route('checkout.confirm') }}">
                        @csrf
                        <button class="btn btn-pink w-100">ยืนยันการสั่งซื้อ</button>
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection





@endsection