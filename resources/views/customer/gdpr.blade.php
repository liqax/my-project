@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')

    <div class="container py-4">
        {{-- หัวข้อ --}}
        <h2 class="mb-4">นโยบายความเป็นส่วนตัว</h2>
        <div class="row align-items-start ">
            <div class="row row-grid">

                {{-- เมนูด้านซ้าย --}}
                <div class=" sidebar ">
                    <a href="/customer/account">บัญชีของฉัน</a>
                    <a href="/orders/sale">คำสั่งซื้อของคุณ</a>
                    <a href="/wishlist">รายการโปรดของคุณ</a>
                    <a href="/customer/address">ข้อมูลที่อยู่จัดส่ง</a>
                    <a href="/orders/history">ประวัติคำสั่งซื้อ</a>
                    <a href="/billing/account">ยืนยันการชำระเงิน</a>
                    <a href="/customer/gdpr"class="fw-bold text-pink">นโยบายความเป็นส่วนตัว</a>
                </div>
            </div>

            <div class="product-grid wishlist md-2" style="padding:20%;">


                <!-- ปุ่มเปิด Modal -->
                <button class="btn btn-privacy btn-outline-primary"style="max-width:300px; margin: 0 auto; display:flex; "
                    data-bs-toggle="modal" data-bs-target="#privacyModal">
                    ดูนโยบายความเป็นส่วนตัว
                </button>


                <!-- Modal: Privacy Policy -->
                <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content rounded-4 shadow">

                            <div class="modal-header bg-light border-0">
                                <h5 class="modal-title fw-bold text-pink" id="privacyModalLabel">นโยบายความเป็นส่วนตัว</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
                            </div>

                            <div class="modal-body fs-6">

                                <p>เว็บไซต์ของเราให้ความสำคัญกับการคุ้มครองข้อมูลส่วนบุคคลของลูกค้าอย่างสูงสุด
                                    เพื่อสร้างความเชื่อมั่นและความปลอดภัยในการใช้งานระบบ</p>

                                <hr>

                                <h5 class="fw-semibold fs-5 mt-4">1. ข้อมูลส่วนบุคคล</h5>
                                <p>ข้อมูลส่วนบุคคลหมายถึง ข้อมูลที่สามารถระบุตัวบุคคลได้ เช่น ชื่อ-นามสกุล, อีเมล,
                                    เบอร์โทรศัพท์, ที่อยู่, หมายเลขคำสั่งซื้อ, รวมถึงข้อมูลการชำระเงิน และหลักฐานการโอนเงิน
                                </p>

                                <h5 class="fw-semibold fs-5 mt-4">2. ข้อมูลที่บริษัทมีความจำเป็นต้องเก็บ</h5>
                                <ul>
                                    <li>ชื่อ-นามสกุล และที่อยู่สำหรับจัดส่งสินค้า</li>
                                    <li>เบอร์โทรศัพท์ และอีเมลสำหรับติดต่อ</li>
                                    <li>หลักฐานการชำระเงิน (สลิป/ไฟล์ภาพ)</li>
                                    <li>พฤติกรรมการสั่งซื้อ (เพื่อการปรับปรุงบริการ)</li>
                                </ul>

                                <h5 class="fw-semibold fs-5 mt-4">3. วัตถุประสงค์ในการเก็บรวบรวมข้อมูล</h5>
                                <ul>
                                    <li>เพื่อดำเนินการจัดส่งสินค้าให้แก่ลูกค้า</li>
                                    <li>เพื่อยืนยันตัวตนและความถูกต้องของคำสั่งซื้อ</li>
                                    <li>เพื่อการติดต่อกลับในกรณีที่มีปัญหาเกี่ยวกับคำสั่งซื้อ</li>
                                    <li>เพื่อการวิเคราะห์และปรับปรุงประสบการณ์ผู้ใช้</li>
                                    <li>เพื่อแจ้งข่าวสาร โปรโมชั่น และสิทธิพิเศษ (หากลูกค้าเลือกสมัคร)</li>
                                </ul>

                                <h5 class="fw-semibold fs-5 mt-4">4. ระยะเวลาในการเก็บรักษาข้อมูล</h5>
                                <p>ข้อมูลส่วนบุคคลของลูกค้าจะถูกจัดเก็บไว้ตราบเท่าที่จำเป็นต่อวัตถุประสงค์ที่ระบุไว้
                                    หรือภายใต้ระยะเวลาตามที่กฎหมายกำหนด</p>

                                <h5 class="fw-semibold fs-5 mt-4">5. การเปิดเผยข้อมูลแก่บุคคลภายนอก</h5>
                                <p>บริษัทจะไม่เปิดเผยข้อมูลส่วนบุคคลของลูกค้าให้แก่บุคคลภายนอก
                                    เว้นแต่เป็นกรณีจำเป็นตามกฎหมาย หรือได้รับความยินยอมจากเจ้าของข้อมูล</p>

                                <h5 class="fw-semibold fs-5 mt-4">6. สิทธิของเจ้าของข้อมูล</h5>
                                <ul>
                                    <li>สิทธิในการเข้าถึง แก้ไข หรือลบข้อมูลส่วนบุคคล</li>
                                    <li>สิทธิในการขอให้ระงับการประมวลผลข้อมูล</li>
                                    <li>สิทธิในการถอนความยินยอม</li>
                                </ul>

                                <h5 class="fw-semibold fs-5 mt-4">7. การติดต่อ</h5>
                                <p>หากลูกค้ามีคำถามเกี่ยวกับนโยบายความเป็นส่วนตัวนี้ หรือต้องการใช้สิทธิใด ๆ กรุณาติดต่อที่
                                    <strong>support@example.com</strong></p>

                            </div>

                            <div class="modal-footer border-0">
                                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                    ยอมรับและปิด
                                </button>
                            </div>

                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>
@endsection
