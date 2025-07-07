@extends('layouts.app')
@section('title', 'คำถามที่พบบ่อย (FAQ)')
@section('content')

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">คำถามที่พบบ่อย</h1>
        <p class="text-muted">เราได้รวบรวมคำตอบสำหรับคำถามที่คุณอาจสงสัยไว้ที่นี่</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            
            <h3 class="mb-3">การสั่งซื้อและชำระเงิน</h3>
            <div class="accordion" id="faqAccordion1">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                            สินค้า Pre-Order ใช้เวลานานเท่าไหร่?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            โดยปกติแล้ว สินค้า Pre-Order จะใช้เวลาในการจัดเตรียมและนำเข้าประมาณ 15-30 วันทำการ อย่างไรก็ตาม ระยะเวลาอาจเปลี่ยนแปลงได้ขึ้นอยู่กับประเภทของสินค้า...
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                            สามารถชำระเงินผ่านช่องทางใดได้บ้าง?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#faqAccordion1">
                        <div class="accordion-body">
                            เรารองรับการชำระเงินผ่านบัตรเครดิต/เดบิต, การโอนเงินผ่านธนาคาร และ PromptPay ครับ/ค่ะ
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="mb-3 mt-5">การจัดส่ง</h3>
            <div class="accordion" id="faqAccordion2">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree">
                            สามารถติดตามสถานะการจัดส่งได้อย่างไร?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#faqAccordion2">
                        <div class="accordion-body">
                            หลังจากที่สินค้าถูกจัดส่งแล้ว คุณจะได้รับอีเมลพร้อมหมายเลขติดตามพัสดุ (Tracking Number) ซึ่งสามารถนำไปตรวจสอบกับบริษัทขนส่งได้โดยตรง
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection