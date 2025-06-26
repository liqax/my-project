@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')

    <div class="container py-4">
        {{-- หัวข้อ --}}
        <h2 class="mb-4">ข้อมูลที่อยู่จัดส่ง</h2>
        <div class="row align-items-start ">
            <div class="row row-grid">

                {{-- เมนูด้านซ้าย --}}
                <div class=" sidebar ">
                    <a href="/customer/account">บัญชีของฉัน</a>
                    <a href="/orders/sale">คำสั่งซื้อของคุณ</a>
                    <a href="/wishlist">รายการโปรดของคุณ</a>
                    <a href="/customer/address"class="fw-bold text-pink">ข้อมูลที่อยู่จัดส่ง</a>
                    <a href="/orders/history">ประวัติคำสั่งซื้อ</a>
                    <a href="/billing/account">ยืนยันการชำระเงิน</a>
                    <a href="/customer/gdpr">นโยบายความเป็นส่วนตัว</a>
                </div>
            </div>

            <div class="product-grid wishlist md-2  ">

                <section class="shipping-address-form py-5">
                    <div class="container">
                        <div class="card shadow-sm rounded-4 p-4 mx-auto" style="max-width: 720px;">
                            <h4 class="text-center fw-bold mb-4">ข้อมูลที่อยู่จัดส่งสินค้า</h4>

                            <form action="{{ route('shipping.save') }}" method="POST">
                                @csrf

                                <div class="row g-3">
                                    <!-- ชื่อและนามสกุล -->
                                    <div class="col-md-6">
                                        <label class="form-label">ชื่อจริง</label>
                                        <input type="text" name="first_name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">นามสกุล</label>
                                        <input type="text" name="last_name" class="form-control" required>
                                    </div>

                                    <!-- บริษัท -->
                                    <div class="col-12">
                                        <label class="form-label">บริษัท (ถ้ามี)</label>
                                        <input type="text" name="company" class="form-control">
                                    </div>

                                    <!-- เบอร์โทรศัพท์ -->
                                    <div class="col-md-6">
                                        <label class="form-label">เบอร์โทรศัพท์</label>
                                        <input type="tel" name="phone" class="form-control" required>
                                    </div>

                                    <!-- รหัสไปรษณีย์ -->
                                    <div class="col-md-6">
                                        <label class="form-label">รหัสไปรษณีย์</label>
                                        <input type="text" name="zipcode" class="form-control" required>
                                    </div>

                                    <!-- ที่อยู่ -->
                                    <div class="col-12">
                                        <label class="form-label">ที่อยู่</label>
                                        <textarea name="address" class="form-control" rows="3" required></textarea>
                                    </div>

                                    <!-- แขวง/ตำบล -->
                                    <div class="col-md-6">
                                        <label class="form-label">แขวง / ตำบล</label>
                                        <input type="text" name="sub_district" class="form-control" required>
                                    </div>

                                    <!-- เขต/อำเภอ -->
                                    <div class="col-md-6">
                                        <label class="form-label">เขต / อำเภอ</label>
                                        <input type="text" name="district" class="form-control" required>
                                    </div>

                                    <!-- จังหวัด -->
                                    <div class="col-md-6">
                                        <label class="form-label">จังหวัด</label>
                                        <input type="text" name="province" class="form-control" required>
                                    </div>

                                    <!-- ประเทศ -->
                                    <div class="col-md-6">
                                        <label class="form-label">ประเทศ</label>
                                        <select name="country" class="form-select" required>
                                            <option value="" disabled selected>-- เลือกประเทศ --</option>
                                            <option value="TH">ประเทศไทย</option>
                                            <option value="US">United States</option>
                                            <option value="JP">Japan</option>
                                            <option value="CN">China</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-grid mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">บันทึกที่อยู่จัดส่ง</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
