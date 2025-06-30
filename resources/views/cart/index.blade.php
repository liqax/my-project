@extends('layouts.app')
@section('title', 'ตะกร้าสินค้า')
@section('content')
    <div class="container py-4">
        <h2 class="mb-4">ตะกร้าสินค้า</h2>

        {{-- success message --}}
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
                    {{-- ลบแท็บ checkout และ status ออกจากตรงนี้ เพราะเราจะใช้หน้าแยกแทน --}}
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
                                                    data-price="{{ $item['price'] }}" data-qty="{{ $item['qty'] }}"
                                                    data-title="{{ $item['title'] }}"
                                                    data-img="{{ asset($item['img']) }}"
                                                    @if (isset($item['size'])) data-size="{{ $item['size'] }}" @endif>
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
                                                        id="hidden-size-{{ $id }}" value="{{ $item['size'] ?? '' }}">
                                                    <div class="input-group input-group-sm w-auto">
                                                        <button type="button" class="btn btn-outline-secondary"
                                                            onclick="decreaseQty('{{ $id }}')">−</button>
                                                        <input type="text" name="qty" id="qty-{{ $id }}"
                                                            value="{{ $item['qty'] }}"
                                                            class="form-control text-center item-qty" style="width: 60px;"
                                                            readonly>
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
                            {{-- เปลี่ยนปุ่มให้ redirect ไปหน้า checkout แทนการเปลี่ยน tab --}}
                            <button class="btn btn-primary w-100" id="loggedInCheckoutButton" disabled>
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
                // ฟังก์ชันอัปเดตราคา
                function updateSummaryPrices() {
                    let selectedSubtotal = 0;
                    let selectedTotalItems = 0;
                    let selectedItemsForCheckout = []; // เก็บข้อมูลสินค้าที่เลือกสำหรับส่งไปหน้า checkout

                    document.querySelectorAll('.item-checkbox:checked').forEach(checkbox => {
                        const id = checkbox.value;
                        const price = parseFloat(checkbox.dataset.price);
                        const qty = parseInt(checkbox.dataset.qty);
                        const title = checkbox.dataset.title;
                        const size = checkbox.dataset.size || null;
                        const img = checkbox.dataset.img || null; // เพิ่มข้อมูลรูปภาพ

                        if (!isNaN(price) && !isNaN(qty)) {
                            selectedSubtotal += price * qty;
                            selectedTotalItems += qty;
                            selectedItemsForCheckout.push({
                                id: id,
                                title: title,
                                price: price,
                                qty: qty,
                                size: size,
                                img: img // เพิ่มรูปภาพ
                            });
                        }
                    });

                    // บันทึกสินค้าที่เลือกใน localStorage เพื่อนำไปใช้ในหน้า checkout
                    localStorage.setItem('selectedCartItems', JSON.stringify(selectedItemsForCheckout));

                    const shipping = selectedSubtotal > 0 ? 50 : 0;
                    const vatPercent = 7;
                    const vatAmount = parseFloat(((selectedSubtotal * vatPercent) / 100).toFixed(2));
                    const grandTotal = parseFloat((selectedSubtotal + shipping + vatAmount).toFixed(2));

                    document.getElementById('summaryTotalItems').innerText = selectedTotalItems;
                    document.getElementById('summarySubtotal').innerText = selectedSubtotal.toFixed(2);
                    document.getElementById('summaryShipping').innerText = shipping.toFixed(2);
                    document.getElementById('summaryVatAmount').innerText = vatAmount.toFixed(2);
                    document.getElementById('summaryGrandTotal').innerText = grandTotal.toFixed(2);
                    document.getElementById('footerGrandTotal').innerText = grandTotal.toFixed(2);

                    checkCheckoutButtonStatus();
                }

                // ฟังก์ชันสำหรับตรวจสอบสถานะปุ่มชำระเงิน
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

                // Event listener สำหรับปุ่ม "ชำระสินค้า"
                document.getElementById('loggedInCheckoutButton')?.addEventListener('click', function() {
                    // ตรวจสอบอีกครั้งว่ามีสินค้าที่เลือกหรือไม่ก่อน Redirect
                    const selectedItemsCount = document.querySelectorAll('.item-checkbox:checked').length;
                    if (selectedItemsCount > 0) {
                        window.location.href = "{{ route('checkout.show') }}"; // เปลี่ยนเส้นทางไปยังหน้า checkout
                    } else {
                        alert('กรุณาเลือกสินค้าที่ต้องการชำระเงิน');
                    }
                });

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
                        checkbox.dataset.qty = qty; // อัปเดต data-qty
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
                            checkbox.dataset.qty = qty; // อัปเดต data-qty
                        }
                        document.getElementById('update-form-' + id).submit();
                    }
                }

                function updateCart(id) {
                    const sizeSelect = document.getElementById('size-' + id);
                    const hiddenSizeInput = document.getElementById('hidden-size-' + id);
                    const checkbox = document.querySelector(`.item-checkbox[value="${id}"]`); // Get the checkbox
                    if (sizeSelect && hiddenSizeInput) {
                        hiddenSizeInput.value = sizeSelect.value;
                        if (checkbox) {
                            checkbox.dataset.size = sizeSelect.value; // Update data-size for checkout
                        }
                    }
                    document.getElementById('update-form-' + id).submit();
                }

                document.addEventListener('DOMContentLoaded', () => {
                    updateSummaryPrices();
                });
            </script>
        </div>
    @endsection