@extends('layouts.app')
@section('title', 'ชำระสินค้า')

@section('content')


    <div class="container py-5">
        <div class="row">
            {{-- คอลัมน์ซ้าย: ฟอร์มกรอกที่อยู่และวิธีชำระ --}}
            <div class="col-md-8">
                {{-- แถบสรุปสถานะ (รายการสินค้า / ชำระสินค้า / สถานะคำสั่งซื้อ) --}}
                <ul class="nav nav-tabs mb-3" id="cartTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link  {{ request()->routeIs('cart.page') ? 'active' : '' }} px-3"
                            role="tab">
                            รายการสินค้า
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#"
                            class="nav-link active {{ request()->routeIs('cart.checkout') ? 'active' : '' }} px-3"
                            role="tab">
                            ชำระสินค้า
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a href="#" class="nav-link {{ request()->routeIs('cart.status') ? 'active' : '' }} px-3"
                            role="tab">
                            สถานะคำสั่งซื้อ
                        </a>
                    </li>
                </ul>

                <div class="row justify-content-center">
                    <div class="col-md-8">
                        {{-- ฟอร์มข้อมูลที่อยู่ผู้จัดส่ง --}}
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="mb-4 fw-bold text-center">ข้อมูลที่อยู่จัดส่งสินค้า</h5>
                                <form>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label>ชื่อจริง</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col">
                                            <label>นามสกุล</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>บริษัท (ถ้ามี)</label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label>เบอร์โทรศัพท์</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col">
                                            <label>รหัสไปรษณีย์</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label>ที่อยู่</label>
                                        <textarea class="form-control" rows="3"></textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label>แขวง / ตำบล</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col">
                                            <label>เขต / อำเภอ</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label>จังหวัด</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                        <div class="col">
                                            <label>ประเทศ</label>
                                            <select class="form-select">
                                                <option selected>-- เลือกประเทศ --</option>
                                                <option value="TH">ประเทศไทย</option>
                                                <option value="US">สหรัฐอเมริกา</option>
                                                <option value="CN">จีน</option>
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary w-100">บันทึกที่อยู่จัดส่ง</button>
                                </form>
                            </div>

                        </div>
                        {{-- วิธีการชำระเงิน --}}
                        <div class="card mb-4 shadow-sm border-0">
                            <div class="card-body">
                                <h5 class="mb-4 fw-bold text-center">
                                    <i class="bi bi-wallet2 me-2"></i> เลือกวิธีการชำระเงิน
                                </h5>

                                {{-- เก็บเงินปลายทาง --}}
                                <div class="form-check payment-option border rounded p-3 mb-3">
                                    <input class="form-check-input me-2" type="radio" name="payment_method" id="cod"
                                        value="cod">
                                    <label class="form-check-label w-100" for="cod">
                                        <i class="bi bi-truck me-2 text-primary"></i>
                                        เก็บเงินปลายทาง (COD)
                                        <div class="small text-muted ms-4">ชำระเงินกับพนักงานจัดส่งเมื่อได้รับสินค้า</div>
                                    </label>
                                </div>

                                {{-- โอนผ่านบัญชีธนาคาร --}}
                                <div class="form-check payment-option border rounded p-3 mb-3">
                                    <input class="form-check-input me-2" type="radio" name="payment_method" id="bank"
                                        value="bank">
                                    <label class="form-check-label w-100" for="bank">
                                        <i class="bi bi-bank me-2 text-success"></i>
                                        โอนผ่านบัญชีธนาคาร
                                        <div class="small text-muted ms-4">โอนเข้าบัญชีธนาคารของร้าน แล้วแนบสลิป</div>
                                    </label>

                                    {{-- ตัวอย่างช่องแสดงเมื่อเลือก bank --}}
                                    <div class="bank-details mt-3 ms-4 d-none" id="bank-details">
                                        <p class="mb-1"><strong>ชื่อบัญชี:</strong> LIGHT SHOP</p>
                                        <p class="mb-1"><strong>ธนาคาร:</strong> กสิกรไทย</p>
                                        <p class="mb-1"><strong>เลขบัญชี:</strong> 123-4-56789-0</p>
                                        <label class="form-label mt-2">แนบสลิปการโอนเงิน:</label>
                                        <input type="file" class="form-control form-control-sm">
                                    </div>
                                </div>

                                {{-- บัตรเครดิต/เดบิต --}}
                                <div class="form-check payment-option border rounded p-3 mb-2">
                                    <input class="form-check-input me-2" type="radio" name="payment_method"
                                        id="credit" value="credit">
                                    <label class="form-check-label w-100" for="credit">
                                        <i class="bi bi-credit-card-2-front me-2 text-danger"></i>
                                        ชำระผ่านบัตรเครดิต / เดบิต
                                        <div class="small text-muted ms-4">รองรับ Visa / Mastercard / QR</div>
                                    </label>
                                </div>
                            </div>
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
                            {{-- เปลี่ยนปุ่มให้ redirect ไปหน้า checkout แทนการเปลี่ยน tab --}}
                            <button class="btn btn-primary w-100" id="loggedInCheckoutButton" disabled>
                                ชำระสินค้า
                            </button>
                        @endguest
                    </div>

                </div>
            </div>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const bankRadio = document.getElementById('bank');
                    const codRadio = document.getElementById('cod');
                    const creditRadio = document.getElementById('credit');
                    const bankDetails = document.getElementById('bank-details');

                    const hideAll = () => {
                        bankDetails.classList.add('d-none');
                    };

                    document.querySelectorAll('input[name="payment_method"]').forEach(radio => {
                        radio.addEventListener('change', function() {
                            hideAll();
                            if (bankRadio.checked) {
                                bankDetails.classList.remove('d-none');
                            }
                        });
                    });
                });
            </script>
            <style>
                .payment-option:hover {
                    background-color: #f8f9fa;
                    border-color: #0d6efd;
                    transition: 0.2s ease-in-out;
                }

                .form-check-input:checked+.form-check-label {
                    font-weight: 600;
                    color: #0d6efd;
                }
            </style>

            <div class="row mt-4">
                <div class="col-md-6">
                    <p class="text-muted">
                        สินค้าทั้งหมดในตะกร้า: รายการ
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
