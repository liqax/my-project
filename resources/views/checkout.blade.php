@extends('layouts.app')
@section('title', 'ชำระสินค้า')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">ชำระสินค้า</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            @if ($address)
                <div class="card shadow-sm rounded-3 p-4 mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <h5 class="fw-bold mb-0">ที่อยู่จัดส่ง</h5>
                        <a href="{{ route('shipping.create') }}" class="btn btn-outline-primary btn-sm">แก้ไขที่อยู่</a>
                    </div>
                    <p class="mb-1 text-muted">
                        {{ $address->first_name }} {{ $address->last_name }}<br>
                        {{ $address->address }}, {{ $address->sub_district }}, {{ $address->district }}<br>
                        {{ $address->province }} {{ $address->zipcode }}<br>
                        โทร: {{ $address->phone }}
                    </p>
                    @if ($address->company)
                        <p class="mb-1 text-muted">บริษัท: {{ $address->company }}</p>
                    @endif
                    <p class="mb-0 text-muted">ประเทศ: {{ $address->country }}</p>
                </div>

                {{-- สรุปรายการสินค้าที่เลือก --}}
                <div class="card shadow-sm rounded-3 p-4 mb-4">
                    <h5 class="fw-bold mb-3">สรุปรายการสินค้าที่เลือก</h5>
                    <div id="checkout-summary-list">
                        {{-- รายการสินค้าที่เลือกจะถูกสร้างด้วย JavaScript --}}
                    </div>
                </div>

                {{-- ฟอร์มยืนยันคำสั่งซื้อ --}}
                <form action="{{ route('order.place') }}" method="POST" id="order-form">
                    @csrf
                    <div id="selected-items-inputs">
                        {{-- Hidden inputs สำหรับสินค้าที่เลือกจะถูกเพิ่มด้วย JavaScript --}}
                    </div>
                    <input type="hidden" name="shipping_address_id" value="{{ $address->id }}"> {{-- ส่ง ID ที่อยู่ไปด้วย --}}

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
                            การคลิก "ยืนยันคำสั่งซื้อ" แสดงว่าคุณยอมรับ <a href="#">ข้อตกลงและเงื่อนไข</a> ของเรา
                        </p>

                        <button type="submit" id="place-order-btn" class="btn btn-success btn-lg w-100">
                            ยืนยันคำสั่งซื้อ
                        </button>
                    </div>
                </form>
            @else
                {{-- กรณีที่ยังไม่มีที่อยู่จัดส่ง --}}
                <div class="alert alert-warning">
                    คุณยังไม่มีที่อยู่จัดส่ง กรุณาเพิ่มที่อยู่เพื่อดำเนินการต่อ
                    <button class="btn btn-sm btn-primary ms-2" type="button" data-bs-toggle="collapse"
                        data-bs-target="#addressForm">
                        เพิ่มที่อยู่
                    </button>
                </div>
                <div id="addressForm" class="collapse mt-3 @error('first_name') show @enderror"> {{-- เพิ่ม show เพื่อให้ฟอร์มเปิดถ้ามี error --}}
                    <div class="card shadow-sm rounded-4 p-4 mx-auto" style="max-width: 720px;">
                        <h4 class="text-center fw-bold mb-4">ข้อมูลที่อยู่จัดส่งสินค้า</h4>

                        <form action="{{ route('shipping.save') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">ชื่อจริง <span class="text-danger">*</span></label>
                                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name') }}" required>
                                    @error('first_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">นามสกุล <span class="text-danger">*</span></label>
                                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name') }}" required>
                                    @error('last_name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">บริษัท (ถ้ามี)</label>
                                    <input type="text" name="company" class="form-control @error('company') is-invalid @enderror" value="{{ old('company') }}">
                                    @error('company') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                                    <input type="tel" name="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" required>
                                    @error('phone') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">รหัสไปรษณีย์ <span class="text-danger">*</span></label>
                                    <input type="text" name="zipcode" class="form-control @error('zipcode') is-invalid @enderror" value="{{ old('zipcode') }}" required>
                                    @error('zipcode') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-12">
                                    <label class="form-label">ที่อยู่ (บ้านเลขที่, ถนน, ซอย) <span class="text-danger">*</span></label>
                                    <textarea name="address" class="form-control @error('address') is-invalid @enderror" rows="3" required>{{ old('address') }}</textarea>
                                    @error('address') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">แขวง / ตำบล <span class="text-danger">*</span></label>
                                    <input type="text" name="sub_district" class="form-control @error('sub_district') is-invalid @enderror" value="{{ old('sub_district') }}" required>
                                    @error('sub_district') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">เขต / อำเภอ <span class="text-danger">*</span></label>
                                    <input type="text" name="district" class="form-control @error('district') is-invalid @enderror" value="{{ old('district') }}" required>
                                    @error('district') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">จังหวัด <span class="text-danger">*</span></label>
                                    <input type="text" name="province" class="form-control @error('province') is-invalid @enderror" value="{{ old('province') }}" required>
                                    @error('province') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">ประเทศ <span class="text-danger">*</span></label>
                                    <select name="country" class="form-select @error('country') is-invalid @enderror" required>
                                        <option value="" disabled selected>-- เลือกประเทศ --</option>
                                        <option value="TH" {{ old('country') == 'TH' ? 'selected' : '' }}>ประเทศไทย</option>
                                        <option value="US" {{ old('country') == 'US' ? 'selected' : '' }}>United States</option>
                                        <option value="JP" {{ old('country') == 'JP' ? 'selected' : '' }}>Japan</option>
                                        {{-- เพิ่มประเทศอื่นๆ ตามต้องการ --}}
                                    </select>
                                    @error('country') <div class="invalid-feedback">{{ $message }}</div> @enderror
                                </div>
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary btn-lg">บันทึกที่อยู่จัดส่ง</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
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
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // JavaScript สำหรับ Checkout Page
    function updateCheckoutSummary() {
        const checkoutSummaryList = document.getElementById('checkout-summary-list');
        const selectedItemsInputs = document.getElementById('selected-items-inputs');
        let totalItems = 0;
        let subtotal = 0;

        const storedSelectedItems = JSON.parse(localStorage.getItem('selectedCartItems')) || [];

        checkoutSummaryList.innerHTML = ''; 
        selectedItemsInputs.innerHTML = '';

        if (storedSelectedItems.length > 0) {
            storedSelectedItems.forEach(item => {
                const itemHtml = `
                    <div class="d-flex justify-content-between mb-2 border-bottom pb-2">
                        <div>
                            <p class="mb-0 fw-bold">${item.title}</p>
                            <small class="text-muted">${item.qty} x ฿${parseFloat(item.price).toFixed(2)}</small>
                            ${item.size ? `<small class="text-muted"> (ขนาด: ${item.size})</small>` : ''}
                        </div>
                        <span>฿${(item.qty * item.price).toFixed(2)}</span>
                    </div>
                `;
                checkoutSummaryList.insertAdjacentHTML('beforeend', itemHtml);

                const inputId = document.createElement('input');
                inputId.type = 'hidden';
                inputId.name = `items[${item.id}][id]`;
                inputId.value = item.id;
                selectedItemsInputs.appendChild(inputId);

                const inputQty = document.createElement('input');
                inputQty.type = 'hidden';
                inputQty.name = `items[${item.id}][qty]`;
                inputQty.value = item.qty;
                selectedItemsInputs.appendChild(inputQty);

                if (item.size) {
                    const inputSize = document.createElement('input');
                    inputSize.type = 'hidden';
                    inputSize.name = `items[${item.id}][size]`;
                    inputSize.value = item.size;
                    selectedItemsInputs.appendChild(inputSize);
                }

                totalItems += item.qty;
                subtotal += item.qty * item.price;
            });
        } else {
            checkoutSummaryList.innerHTML = '<p class="text-muted">ไม่มีสินค้าที่เลือกสำหรับการชำระเงิน</p>';
        }

        const shipping = subtotal > 0 ? 50 : 0;
        const vatPercent = 7;
        const vatAmount = parseFloat(((subtotal * vatPercent) / 100).toFixed(2));
        const grandTotal = parseFloat((subtotal + shipping + vatAmount).toFixed(2));

        document.getElementById('summaryTotalItems').innerText = totalItems;
        document.getElementById('summarySubtotal').innerText = subtotal.toFixed(2);
        document.getElementById('summaryShipping').innerText = shipping.toFixed(2);
        document.getElementById('summaryVatAmount').innerText = vatAmount.toFixed(2);
        document.getElementById('summaryGrandTotal').innerText = grandTotal.toFixed(2);
    }

    document.addEventListener('DOMContentLoaded', updateCheckoutSummary);

    document.addEventListener('DOMContentLoaded', function () {
        const addressFormCollapse = document.getElementById('addressForm');
        const hasError = document.querySelector('.is-invalid');
        if (hasError && addressFormCollapse) {
            new bootstrap.Collapse(addressFormCollapse, {
                toggle: true
            });
        }
    });

</script>
@endsection