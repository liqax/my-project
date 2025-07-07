@extends('layouts.app')
@section('title', 'เงื่อนไขการให้บริการ')
@section('content')

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">เงื่อนไขการให้บริการ</h1>
        <p class="text-muted">อัปเดตล่าสุด: 7 กรกฎาคม 2568</p>
    </div>

    <div class="row">
        {{-- Sidebar สำหรับนำทาง --}}
        <div class="col-md-3">
            <div class="sticky-top" style="top: 80px;">
                <h5 class="mb-3">หัวข้อทั้งหมด</h5>
                <nav class="nav flex-column nav-pills">
                    <a class="nav-link fw-small " href="#section1">1. การยอมรับข้อตกลง</a>
                    <a class="nav-link" href="#section2">2. บัญชีผู้ใช้</a>
                    <a class="nav-link" href="#section3">3. การสั่งซื้อสินค้า (Pre-Order)</a>
                    <a class="nav-link" href="#section4">4. การชำระเงิน</a>
                    <a class="nav-link" href="#section5">5. ทรัพย์สินทางปัญญา</a>
                </nav>
            </div>
        </div>

        {{-- เนื้อหาหลัก --}}
        <div class="col-md-9">
            <div class="p-4 mb-4 bg-light rounded-3">
                <h4 class="fst-italic">สรุปฉบับเข้าใจง่าย</h4>
                <p class="mb-0">การใช้บริการเว็บไซต์นี้หมายความว่าคุณยอมรับข้อตกลงของเรา กรุณาใช้ข้อมูลจริงในการสมัครสมาชิก และทำความเข้าใจว่าสินค้า Pre-Order ต้องใช้ระยะเวลาในการจัดส่ง...</p>
            </div>

            <article class="blog-post">
                <h2 class="blog-post-title border-bottom pb-3 mb-4" id="section1">1. การยอมรับข้อตกลง</h2>
                <p>เนื้อหาในส่วนที่ 1...</p>

                <h2 class="blog-post-title border-bottom pb-3 mb-4 mt-5" id="section2">2. บัญชีผู้ใช้</h2>
                <p>เนื้อหาในส่วนที่ 2...</p>

                <h2 class="blog-post-title border-bottom pb-3 mb-4 mt-5" id="section3">3. การสั่งซื้อสินค้า (Pre-Order)</h2>
                <p>เนื้อหาในส่วนที่ 3...</p>

                <h2 class="blog-post-title border-bottom pb-3 mb-4 mt-5" id="section4">4. การชำระเงิน</h2>
                <p>เนื้อหาในส่วนที่ 4...</p>

                <h2 class="blog-post-title border-bottom pb-3 mb-4 mt-5" id="section5">5. ทรัพย์สินทางปัญญา</h2>
                <p>เนื้อหาในส่วนที่ 5...</p>
            </article>
        </div>
    </div>
</div>
@endsection