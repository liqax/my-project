@extends('layouts.app')
@section('title', 'ตะกร้าสินค้า')
@section('content')
    <div class="container py-4">
        <h2 class="mb-4">ตะกร้าสินค้า</h2>

        {{--  success  --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            <div class="col-lg-8">
                {{-- แท็บสรุปสถานะ (รายการสินค้า / ชำระสินค้า / สถานะคำสั่งซื้อ) --}}
                <ul class="nav nav-tabs mb-3" id="cartTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active px-3" id="items-tab" data-bs-toggle="tab" data-bs-target="#items"
                            type="button" role="tab">
                            รายการสินค้า ({{ count($cart) }})
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-3" id="checkout-tab" data-bs-toggle="tab" data-bs-target="#checkout"
                            type="button" role="tab">
                            ชำระสินค้า
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link px-3" id="status-tab" data-bs-toggle="tab" data-bs-target="#status"
                            type="button" role="tab">
                            สถานะคำสั่งซื้อ
                        </button>
                    </li>
                </ul>
                <div class="tab-content mb-4" id="cartTabsContent">
                    {{-- แท็บ 1: รายการสินค้า --}}
                    <div class="tab-pane fade show active" id="items" role="tabpanel">
                        @if (count($cart) > 0)
                            {{-- “เลือกทั้งหมด” --}}
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="selectAll">
                                <label class="form-check-label" for="selectAll">เลือกทั้งหมด ({{ count($cart) }}
                                    รายการ)</label>
                            </div>

                            {{-- ลูปรายการสินค้า --}}
                            @foreach ($cart as $id => $item)
                                @php
                                    // คำนวณราคาเดิมและราคาหลังลด
                                    $original_price = $item['original_price'] ?? $item['price'];
                                    $discounted_price = $item['price'];
                                @endphp
                                <div class="card mb-3 item-card" style="background-color: #ffecec;">
                                    <div class="row g-0 align-items-center">
                                        {{-- Checkbox --}}
                                        <div class="col-auto ps-3 pe-0">
                                            <div class="form-check">
                                                <input class="form-check-input item-checkbox" type="checkbox"
                                                    name="select_item[]" value="{{ $id }}"
                                                    data-price="{{ $item['price'] }}" data-qty="{{ $item['qty'] }}">
                                            </div>
                                        </div>

                                        {{-- รูปสินค้า --}}
                                        <div class="col-auto">
                                            <img src="{{ asset($item['img']) }}" class="img-fluid rounded-start"
                                                alt="Product Image" style="width: 100px; height: 100px; object-fit: cover;">
                                        </div>

                                        {{-- ข้อมูลสินค้า --}}
                                        <div class="col-lg-6">
                                            <div class="card-body">
                                                <h5 class="card-title mb-1">{{ $item['title'] }}</h5>
                                                @if ($original_price > $discounted_price)
                                                    <p class="text-muted mb-0">
                                                        <del>฿{{ number_format($original_price, 2) }}</del>
                                                    </p>
                                                @endif
                                                <p class="text-danger fw-bold mb-1">
                                                    ฿<span
                                                        class="item-display-price">{{ number_format($discounted_price, 2) }}</span>
                                                </p>

                                                {{-- ตัวเลือกขนาด (ถ้ามี) --}}
                                                @if (isset($item['size']))
                                                    <div class="mb-2">
                                                        <label for="size-{{ $id }}"
                                                            class="form-label small mb-1">ขนาดสินค้า:</label>
                                                        <select id="size-{{ $id }}"
                                                            class="form-select form-select-sm w-auto"
                                                            onchange="updateCart('{{ $id }}')">
                                                            <option value="S"
                                                                {{ $item['size'] == 'S' ? 'selected' : '' }}>S</option>
                                                            <option value="M"
                                                                {{ $item['size'] == 'M' ? 'selected' : '' }}>M</option>
                                                            <option value="L"
                                                                {{ $item['size'] == 'L' ? 'selected' : '' }}>L</option>
                                                            <option value="XL"
                                                                {{ $item['size'] == 'XL' ? 'selected' : '' }}>XL</option>
                                                        </select>
                                                    </div>
                                                @endif

                                                {{-- ฟอร์มอัปเดตจำนวน --}}
                                                <form id="update-form-{{ $id }}"
                                                    action="{{ route('cart.update') }}" method="POST"
                                                    class="d-inline-block">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $id }}">
                                                    <input type="hidden" name="size"
                                                        id="hidden-size-{{ $id }}" value="{{ $item['size'] }}">
                                                    <div class="input-group input-group-sm w-auto">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            onclick="decreaseQty('{{ $id }}')">−</button>
                                                        <input type="text" name="qty" id="qty-{{ $id }}"
                                                            value="{{ $item['qty'] }}"
                                                            class="form-control text-center item-qty" style="width: 60px;"
                                                            readonly> {{-- เพิ่ม readonly เพื่อป้องกันการพิมพ์ตรงๆ --}}
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            onclick="increaseQty('{{ $id }}')">+</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        {{-- ปุ่มลบสินค้า --}}
                                        <div class="col-auto pe-3">
                                            <form action="{{ route('cart.remove') }}" method="POST"
                                                class="d-inline-block">
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
                        {{-- ตรวจสอบว่ามีที่อยู่จัดส่งหรือยัง --}}
                        @if ($address ?? false)
                            <div class="card shadow-sm rounded-3 p-4 mb-4">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <h5 class="fw-bold mb-0">ที่อยู่จัดส่ง</h5>
                                    <a href="{{ route('shipping.create') }}"
                                        class="btn btn-outline-primary btn-sm">แก้ไขที่อยู่</a>
                                </div>
                                <p class="mb-1 text-muted">
                                    {{ $address->first_name }} {{ $address->last_name }}<br>
                                    {{ $address->address }}, {{ $address->sub_district }}, {{ $address->district }}<br>
                                    {{ $address->province }} {{ $address->zipcode }}<br>
                                    โทร: {{ $address->phone }}
                                </p>
                            </div>

                            <div class="card shadow-sm rounded-3 p-4 mb-4">
                                <h5 class="fw-bold mb-3">สรุปรายการสินค้า</h5>
                                <div id="checkout-summary-list">
                                </div>
                            </div>

                            <form action="{{ route('order.place') }}" method="POST" id="order-form">
                                @csrf
                                <div id="selected-items-inputs"></div>

                                <div class="card shadow-sm rounded-3 p-4">
                                    <h5 class="fw-bold mb-3">ช่องทางการชำระเงิน</h5>
                                    <div class="form-check mb-2">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="payment_transfer" value="bank_transfer" checked>
                                        <label class="form-check-label" for="payment_transfer">
                                            โอนเงินผ่านธนาคาร
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="payment_method"
                                            id="payment_cod" value="cod">
                                        <label class="form-check-label" for="payment_cod">
                                            เก็บเงินปลายทาง (Cash on Delivery)
                                        </label>
                                    </div>
                                    <hr>
                                    <p class="text-muted small">
                                        การคลิก "ยืนยันคำสั่งซื้อ" แสดงว่าคุณยอมรับ <a
                                            href="#">ข้อตกลงและเงื่อนไข</a> ของเรา
                                    </p>

                                    {{-- ปุ่ม Submit ของฟอร์มหลัก --}}
                                    <button type="submit" id="place-order-btn" class="btn btn-success btn-lg w-100">
                                        ยืนยันคำสั่งซื้อ
                                    </button>
                                </div>
                            </form>
                        @else
                            {{-- ถ้าไม่มีที่อยู่ ให้แสดงฟอร์มกรอกที่อยู่ (เหมือนเดิม) --}}
                            <div class="alert alert-warning">
                                คุณยังไม่มีที่อยู่จัดส่ง, กรุณาเพิ่มที่อยู่เพื่อดำเนินการต่อ
                                <button class="btn btn-sm btn-primary ms-2" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#addressForm">
                                    เพิ่มที่อยู่
                                </button>
                            </div>
                              <div class="alert alert-warning">
                                คุณยังไม่เลือกวิธีชำระเงิน, กรุณาเลือกวิธีการชำระเงินเพื่อดำเนินการต่อ
                                <button class="btn btn-sm btn-primary ms-2" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#addressForm">
                                    เลือกวิธี
                                </button>
                            </div>
                            <div id="addressForm" class="collapse mt-3">
                                <div class="card shadow-sm rounded-4 p-4 mx-auto" style="max-width: 720px;">
                                    <h4 class="text-center fw-bold mb-4">ข้อมูลที่อยู่จัดส่งสินค้า</h4>

                                    <form action="{{ route('shipping.save') }}" method="POST">
                                        @csrf
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label class="form-label">ชื่อจริง</label>
                                                <input type="text" name="first_name" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">นามสกุล</label>
                                                <input type="text" name="last_name" class="form-control" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">บริษัท (ถ้ามี)</label>
                                                <input type="text" name="company" class="form-control">
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">เบอร์โทรศัพท์</label>
                                                <input type="tel" name="phone" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">รหัสไปรษณีย์</label>
                                                <input type="text" name="zipcode" class="form-control" required>
                                            </div>
                                            <div class="col-12">
                                                <label class="form-label">ที่อยู่</label>
                                                <textarea name="address" class="form-control" rows="3" required></textarea>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">แขวง / ตำบล</label>
                                                <input type="text" name="sub_district" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">เขต / อำเภอ</label>
                                                <input type="text" name="district" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">จังหวัด</label>
                                                <input type="text" name="province" class="form-control" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label">ประเทศ</label>
                                                <select name="country" class="form-select" required>
                                                    <option value="" disabled selected>-- เลือกประเทศ --</option>
                                                    <option value="TH">ประเทศไทย</option>
                                                    <option value="US">United States</option>
                                                    <option value="JP">Japan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-grid mt-4">
                                            <button type="submit"
                                                class="btn btn-primary btn-lg">บันทึกที่อยู่จัดส่ง</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        @endif
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

                        <div class="d-flex justify-content-between mb-2">
                            <span>รวมเงินสินค้า (<span id="summaryTotalItems">0</span> ชิ้น)</span>
                            <span>฿<span id="summarySubtotal">0.00</span></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>ค่าจัดส่ง</span>
                            <span>฿<span id="summaryShipping">0.00</span></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>VAT (7%)</span> 
                            <span>฿<span id="summaryVatAmount">0.00</span></span>
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between fw-bold mb-3">
                            <span>ยอดชำระสุทธิ</span>
                            <span>฿<span id="summaryGrandTotal">0.00</span></span>
                        </div>

                        {{-- ปุ่มชำระสินค้า --}}
                        @guest
                            
                            <button class="btn btn-warning w-100" data-bs-toggle="modal" data-bs-target="#authModal"
                                id="guestCheckoutButton" disabled>
                                กรุณาเข้าสู่ระบบก่อนชำระสินค้า
                            </button>
                        @else
                            
                            <button class="btn btn-primary w-100" onclick="document.getElementById('checkout-tab').click();"
                                id="loggedInCheckoutButton" disabled>
                                ชำระสินค้า
                            </button>
                        @endguest
                    </div>
                </div>
            </div>

         
            <div class="row mt-4">
                <div class="col-md-6">
                    <p class="text-muted">
                        สินค้าทั้งหมดในตะกร้า: {{ count($cart) }} รายการ
                        &nbsp;|&nbsp;
                        ยอดชำระสินค้าที่เลือก: <span class="fw-bold text-primary">฿<span
                                id="footerGrandTotal">0.00</span></span>
                    </p>
                </div>
            </div>

            <script>
              

                function updateSummaryPrices() {
                    let selectedSubtotal = 0;
                    let selectedTotalItems = 0;

                    // วนลูปเฉพาะ checkbox ที่ถูกเลือก
                    document.querySelectorAll('.item-checkbox:checked').forEach(checkbox => {
                        const price = parseFloat(checkbox.dataset.price);
                        const qty = parseInt(checkbox.dataset.qty);
                        if (!isNaN(price) && !isNaN(qty)) {
                            selectedSubtotal += price * qty;
                            selectedTotalItems += qty;
                        }
                    });

                    const shipping = selectedSubtotal > 0 ? 50 : 0; // ค่าจัดส่ง 50 บาท ถ้ามีสินค้าที่เลือก
                    const vatPercent = 7; // VAT 7%
                    const vatAmount = parseFloat(((selectedSubtotal * vatPercent) / 100).toFixed(2));
                    const grandTotal = parseFloat((selectedSubtotal + shipping + vatAmount).toFixed(2));

                    // อัปเดตค่าในส่วน Summary
                    document.getElementById('summaryTotalItems').innerText = selectedTotalItems;
                    document.getElementById('summarySubtotal').innerText = selectedSubtotal.toFixed(2);
                    document.getElementById('summaryShipping').innerText = shipping.toFixed(2);
                    document.getElementById('summaryVatAmount').innerText = vatAmount.toFixed(2);
                    document.getElementById('summaryGrandTotal').innerText = grandTotal.toFixed(2);
                    document.getElementById('footerGrandTotal').innerText = grandTotal.toFixed(2); // อัปเดตใน footer ด้วย

                    // เรียกใช้ฟังก์ชันตรวจสอบสถานะปุ่มชำระเงิน
                    checkCheckoutButtonStatus();
                }

                // ฟังก์ชันเดิม: สำหรับตรวจสอบสถานะปุ่มชำระเงิน
                function checkCheckoutButtonStatus() {
                    const selectedItemsCount = document.querySelectorAll('.item-checkbox:checked').length;

                    const guestCheckoutButton = document.getElementById('guestCheckoutButton');
                    const loggedInCheckoutButton = document.getElementById('loggedInCheckoutButton');

                    if (guestCheckoutButton) {
                        if (selectedItemsCount > 0) {
                            guestCheckoutButton.removeAttribute('disabled');
                        } else {
                            guestCheckoutButton.setAttribute('disabled', 'true');
                        }
                    }

                    if (loggedInCheckoutButton) {
                        if (selectedItemsCount > 0) {
                            loggedInCheckoutButton.removeAttribute('disabled');
                        } else {
                            loggedInCheckoutButton.setAttribute('disabled', 'true');
                        }
                    }
                }


                
                document.getElementById('selectAll')?.addEventListener('change', function() {
                    const checkboxes = document.querySelectorAll('.item-checkbox');
                    checkboxes.forEach(cb => {
                        cb.checked = this.checked;
                    });
                    updateSummaryPrices(); 
                });

                
                document.querySelectorAll('.item-checkbox').forEach(checkbox => {
                    checkbox.addEventListener('change', function() {
                        updateSummaryPrices(); 
                       
                        const totalCheckboxes = document.querySelectorAll('.item-checkbox').length;
                        const checkedCheckboxes = document.querySelectorAll('.item-checkbox:checked').length;
                        document.getElementById('selectAll').checked = totalCheckboxes === checkedCheckboxes;
                    });
                });

               
                function increaseQty(id) {
                    const input = document.getElementById('qty-' + id);
                    let qty = parseInt(input.value) || 1;
                    qty++;
                    input.value = qty;
                    const checkbox = document.querySelector(`.item-checkbox[value="${id}"]`);
                    if (checkbox) {
                        checkbox.dataset.qty = qty; 
                    }
                   
                    document.getElementById('update-form-' + id).submit();
                }

                function decreaseQty(id) {
                    const input = document.getElementById('qty-' + id);
                    let qty = parseInt(input.value) || 1;
                    if (qty > 1) {
                        qty--;
                        input.value = qty;
                        const checkbox = document.querySelector(`.item-checkbox[value="${id}"]`);
                        if (checkbox) {
                            checkbox.dataset.qty = qty; 
                        }
                      
                        document.getElementById('update-form-' + id).submit();
                    }
                }

               
                function updateCart(id) {
                    const sizeSelect = document.getElementById('size-' + id);
                    const hiddenSizeInput = document.getElementById('hidden-size-' + id);
                    if (sizeSelect && hiddenSizeInput) {
                        hiddenSizeInput.value = sizeSelect.value;
                    }
                   
                    document.getElementById('update-form-' + id).submit();
                }


              
                document.addEventListener('DOMContentLoaded', () => {
                    updateSummaryPrices(); 
                });
            </script>
        </div>
    @endsection

   