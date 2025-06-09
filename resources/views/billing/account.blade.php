@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')

    <div class="container py-4">
        {{-- หัวข้อ --}}
        <h2 class="mb-4">ยืนยันการชำระเงิน</h2>
        <div class="row align-items-start ">
            <div class="row row-grid">

                {{-- เมนูด้านซ้าย --}}
                <div class=" sidebar ">
                    <a href="/customer/account">บัญชีของฉัน</a>
                    <a href="/orders/sale">คำสั่งซื้อของคุณ</a>
                    <a href="/wishlist">รายการโปรดของคุณ</a>
                    <a href="/customer/address">ข้อมูลที่อยู่จัดส่ง</a>
                    <a href="/orders/history">ประวัติคำสั่งซื้อ</a>
                    <a href="/billing/account"class="fw-bold text-pink">ยืนยันการชำระเงิน</a>
                    <a href="/customer/gdpr">นโยบายความเป็นส่วนตัว</a>
                </div>
            </div>

            <div class="product-grid wishlist md-2  ">
                <section class="payment-confirmation py-5">
                    <div class="container">
                        <div class="card shadow-sm rounded-4 p-4 mx-auto" style="max-width: 700px;">
                            <h3 class="text-center mb-4 fw-bold">ยืนยันการชำระเงิน</h3>

                            <form action="/payment/confirm" method="POST" enctype="multipart/form-data">
                                <!-- @csrf -->

                                <!-- อัปโหลดสลิป -->
                                <div class="mb-4 text-center">
                                    <label class="form-label fw-semibold">อัปโหลดหลักฐานการโอน</label>
                                    <input type="file" name="slip" class="form-control" accept="image/*" required>
                                    <small class="text-muted">รองรับไฟล์ภาพ ขนาดไม่เกิน 5MB</small>
                                </div>

                                <!-- ชื่อผู้ชำระ -->
                                <div class="mb-3">
                                    <label class="form-label">ชื่อ - นามสกุล</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <!-- อีเมล -->
                                <div class="mb-3">
                                    <label class="form-label">อีเมล</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <!-- เบอร์โทร -->
                                <div class="mb-3">
                                    <label class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div>

                                <!-- รายการสั่งซื้อ -->
                                <div class="mb-3">
                                    <label class="form-label">หมายเลขคำสั่งซื้อ</label>
                                    <input type="text" name="order_id" class="form-control" placeholder="เช่น ORD123456"
                                        required>
                                </div>

                                <!-- เลือกธนาคาร -->
                                <div class="mb-3">
                                    <label class="form-label">ชำระเงินเข้าบัญชี</label>
                                    <div class="list-group">
                                        <label class="list-group-item">
                                            <input class="form-check-input me-2" type="radio" name="bank"
                                                value="SCB" required>
                                            <img src="/img/scb.svg" alt="SCB" width="24"> ธ.ไทยพาณิชย์
                                            xxx-x-xxxxx-x
                                        </label>
                                        <label class="list-group-item">
                                            <input class="form-check-input me-2" type="radio" name="bank"
                                                value="KBank" required>
                                            <img src="/img/kbank.svg" alt="KBank" width="24"> ธ.กสิกรไทย
                                            xxx-x-xxxxx-x
                                        </label>
                                    </div>
                                </div>

                                <!-- วันเวลาที่โอน -->
                                <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">วันที่โอน</label>
                                        <input type="date" name="transfer_date" class="form-control" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">เวลาที่โอน</label>
                                        <input type="time" name="transfer_time" class="form-control" required>
                                    </div>
                                </div>

                                <!-- จำนวนเงิน -->
                                <div class="mb-3">
                                    <label class="form-label">จำนวนเงินที่โอน (บาท)</label>
                                    <input type="number" name="amount" class="form-control" min="1" step="0.01"
                                        required>
                                </div>

                                <!-- ปุ่ม -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                          ยืนยันการชำระเงิน
                                    </button>
                                </div>

                            </form>
                        </div>
                    </div>
                </section>



            </div>
        </div>
    </div>
@endsection
