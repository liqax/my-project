
{{-- resources/views/cart/index.blade.php --}}
@extends('layouts.app')

@section('title', 'ตะกร้าสินค้า')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">ตะกร้าสินค้า</h1>

    {{-- แสดงข้อความ success (ถ้ามี) --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        {{-- คอลัมน์ซ้าย: รายการสินค้า --}}
        <div class="col-lg-8">
            {{-- แท็บสรุปสถานะ (รายการสินค้า / ชำระสินค้า / สถานะคำสั่งซื้อ) --}}
            <ul class="nav nav-tabs mb-3" id="cartTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active px-3" id="items-tab" data-bs-toggle="tab" data-bs-target="#items" type="button" role="tab">
                        รายการสินค้า ({{ count($cart) }})
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-3" id="checkout-tab" data-bs-toggle="tab" data-bs-target="#checkout" type="button" role="tab">
                        ชำระสินค้า
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link px-3" id="status-tab" data-bs-toggle="tab" data-bs-target="#status" type="button" role="tab">
                        สถานะคำสั่งซื้อ
                    </button>
                </li>
            </ul>
            <div class="tab-content mb-4" id="cartTabsContent">
                {{-- แท็บ 1: รายการสินค้า --}}
                <div class="tab-pane fade show active" id="items" role="tabpanel">
                    @if(count($cart) > 0)
                        {{-- “เลือกทั้งหมด” --}}
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="selectAll">
                            <label class="form-check-label" for="selectAll">เลือกทั้งหมด ({{ count($cart) }} รายการ)</label>
                        </div>
                        {{-- ลูปรายการสินค้า --}}
                        @foreach($cart as $id => $item)
                            @php
                                // คำนวณราคาเดิมและราคาหลังลด
                                $original_price = $item['original_price'] ?? $item['price'];
                                $discounted_price = $item['price'];
                            @endphp
                            <div class="card mb-3" style="background-color: #ffecec;">
                                <div class="row g-0 align-items-center">
                                    {{-- Checkbox --}}
                                    <div class="col-auto ps-3 pe-0">
                                        <div class="form-check">
                                            <input class="form-check-input item-checkbox" type="checkbox" name="select_item[]" value="{{ $id }}">
                                        </div>
                                    </div>

                                    {{-- รูปสินค้า --}}
                                    <div class="col-auto">
                                        <img src="{{ asset($item['img']) }}" class="img-fluid rounded-start" alt="Product Image" style="width: 100px; height: 100px; object-fit: cover;">
                                    </div>

                                    {{-- ข้อมูลสินค้า --}}
                                    <div class="col-lg-6">
                                        <div class="card-body">
                                            <h5 class="card-title mb-1">{{ $item['title'] }}</h5>
                                            {{-- แสดงราคาเดิม (หากต่างกัน) --}}
                                            @if($original_price > $discounted_price)
                                                <p class="text-muted mb-0">
                                                    <del>฿{{ number_format($original_price, 2) }}</del>
                                                </p>
                                            @endif
                                            <p class="text-danger fw-bold mb-1">฿{{ number_format($discounted_price, 2) }}</p>

                                            {{-- ตัวเลือกขนาด (ถ้ามี) --}}
                                            @if(isset($item['size']))
                                                <div class="mb-2">
                                                    <label for="size-{{ $id }}" class="form-label small mb-1">ขนาดสินค้า:</label>
                                                    <select id="size-{{ $id }}" class="form-select form-select-sm w-auto" onchange="updateCart('{{ $id }}')">
                                                        <option value="S" {{ $item['size'] == 'S' ? 'selected' : '' }}>S</option>
                                                        <option value="M" {{ $item['size'] == 'M' ? 'selected' : '' }}>M</option>
                                                        <option value="L" {{ $item['size'] == 'L' ? 'selected' : '' }}>L</option>
                                                        <option value="XL" {{ $item['size'] == 'XL' ? 'selected' : '' }}>XL</option>
                                                    </select>
                                                </div>
                                            @endif

                                            {{-- ฟอร์มอัปเดตจำนวน --}}
                                            <form id="update-form-{{ $id }}" action="{{ route('cart.update') }}" method="POST" class="d-inline-block">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $id }}">
                                                <input type="hidden" name="size" id="hidden-size-{{ $id }}" value="{{ $item['size'] }}">
                                                <div class="input-group input-group-sm w-auto">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="decreaseQty('{{ $id }}')">−</button>
                                                    <input type="text" name="qty" id="qty-{{ $id }}" value="{{ $item['qty'] }}" class="form-control text-center" style="width: 60px;">
                                                    <button type="button" class="btn btn-outline-secondary" onclick="increaseQty('{{ $id }}')">+</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    {{-- ปุ่มลบสินค้า --}}
                                    <div class="col-auto pe-3">
                                        <form action="{{ route('cart.remove') }}" method="POST" class="d-inline-block">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    @else
                        <div class="alert alert-secondary text-center">
                            คุณไม่มีสินค้าในตะกร้า
                        </div>
                    @endif
                </div>

                {{-- แท็บ 2: ชำระสินค้า (Placeholder) --}}
                <div class="tab-pane fade" id="checkout" role="tabpanel">
                    <div class="alert alert-info">
                        ฟอร์มชำระเงิน / กรอกที่อยู่จัดส่ง / เลือกช่องทางชำระเงิน ฯลฯ
                    </div>
                </div>

                {{-- แท็บ 3: สถานะคำสั่งซื้อ (Placeholder) --}}
                <div class="tab-pane fade" id="status" role="tabpanel">
                    <div class="alert alert-info">
                        ประวัติคำสั่งซื้อของคุณ (Tracking / สถานะจัดส่ง ฯลฯ)
                    </div>
                </div>
            </div>
        </div>

        {{-- คอลัมน์ขวา: สรุปยอด (Summary) --}}
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title mb-3">สรุปยอดชำระสินค้า</h5>
                    @php
                        $subtotal = 0;
                        $totalItems = 0;
                        foreach($cart as $id => $item) {
                            $subtotal += ($item['price'] * $item['qty']);
                            $totalItems += $item['qty'];
                        }
                        $shipping = $subtotal > 0 ? 50 : 0;     // สมมติค่าขนส่ง 50 บาท (ถ้ามียอด)
                        $vatPercent = 7;                       // สมมติ VAT 7%
                        $vatAmount = round(($subtotal * $vatPercent) / 100, 2);
                        $grandTotal = $subtotal + $shipping + $vatAmount;
                    @endphp

                    <div class="d-flex justify-content-between mb-2">
                        <span>รวมเงินสินค้า ({{ $totalItems }} ชิ้น)</span>
                        <span>฿{{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>ค่าจัดส่ง</span>
                        <span>฿{{ number_format($shipping, 2) }}</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>VAT ({{ $vatPercent }}%)</span>
                        <span>฿{{ number_format($vatAmount, 2) }}</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between fw-bold mb-3">
                        <span>ยอดชำระสุทธิ</span>
                        <span>฿{{ number_format($grandTotal, 2) }}</span>
                    </div>

                    {{-- ปุ่มชำระสินค้า --}}
                    <a href="{{ route('checkout.page') }}" class="btn btn-success w-100">ชำระสินค้า</a>
                </div>
            </div>
        </div>
    </div>

    {{-- แถบสรุปด้านล่าง --}}
    <div class="row mt-4">
        <div class="col-md-6">
            <p class="text-muted">
                สินค้า {{ count($cart) }} รายการ
                &nbsp;|&nbsp;
                ยอดชำระสินค้า: <span class="fw-bold text-primary">฿{{ number_format($grandTotal, 2) }}</span>
            </p>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('checkout.page') }}" class="btn btn-lg btn-warning">
                <i class="bi bi-credit-card-2-front-fill me-1"></i> ชำระสินค้า
            </a>
        </div>
    </div>
</div>
@endsection

{{-- ปล. ใส่ JavaScript เล็กน้อยเพื่ออัปเดตจำนวน --}}
@push('scripts')
<script>
    // เพิ่ม/ลดจำนวน แล้ว submit form
    function increaseQty(id) {
        let qtyInput = document.getElementById('qty-' + id);
        let current = parseInt(qtyInput.value) || 1;
        qtyInput.value = current + 1;
        document.getElementById('update-form-' + id).submit();
    }
    function decreaseQty(id) {
        let qtyInput = document.getElementById('qty-' + id);
        let current = parseInt(qtyInput.value) || 1;
        if (current > 1) {
            qtyInput.value = current - 1;
            document.getElementById('update-form-' + id).submit();
        }
    }
    // เมื่อเปลี่ยนขนาด จะเก็บค่า size ลง hidden แล้ว submit form
    function updateCart(id) {
        let sizeSel = document.getElementById('size-' + id);
        let hiddenSize = document.getElementById('hidden-size-' + id);
        hiddenSize.value = sizeSel.value;
        document.getElementById('update-form-' + id).submit();
    }

    // ฟังก์ชัน select all checkbox (ถ้ามี logic อื่น ๆ)
    document.getElementById('selectAll')?.addEventListener('change', function() {
        let checkboxes = document.querySelectorAll('.item-checkbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });
</script>
@endpush
