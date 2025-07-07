@extends('layouts.app')
@section('title', 'นโยบายการคืนสินค้า')
@section('content')

<div class="container py-5">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">นโยบายการคืนสินค้า</h1>
        <p class="text-muted">ความพึงพอใจของคุณคือสิ่งสำคัญที่สุดสำหรับเรา</p>
    </div>

    {{-- ขั้นตอนการคืนสินค้า --}}
    <div class="row text-center mb-5 g-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <i class="bi bi-chat-dots-fill fs-1 text-pink mb-3"></i>
                <h4 class="fw-bold">1. ติดต่อเรา</h4>
                <p>แจ้งความประสงค์ในการคืนสินค้าภายใน 7 วันหลังได้รับสินค้า</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <i class="bi bi-box-seam-fill fs-1 text-pink mb-3"></i>
                <h4 class="fw-bold">2. เตรียมสินค้า</h4>
                <p>แพ็คสินค้าให้อยู่ในสภาพสมบูรณ์พร้อมหลักฐานการสั่งซื้อ</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm p-4 h-100">
                <i class="bi bi-truck fs-1 text-pink mb-3"></i>
                <h4 class="fw-bold">3. จัดส่งคืน</h4>
                <p>ส่งสินค้ากลับมาตามที่อยู่ที่เจ้าหน้าที่แจ้ง</p>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h3 class="mb-3 border-bottom pb-2">เงื่อนไขการคืนสินค้า</h3>
            
            <h5 class="text-success">✅ สินค้าที่สามารถคืนได้</h5>
            <ul>
                <li>สินค้าชำรุดหรือเสียหายจากการผลิต/ขนส่ง</li>
                <li>ได้รับสินค้าไม่ตรงตามที่สั่งซื้อ</li>
                <li>สินค้าต้องยังไม่ถูกใช้งานและอยู่ในบรรจุภัณฑ์ที่สมบูรณ์</li>
            </ul>

            <h5 class="text-danger mt-4">❌ สินค้าที่ไม่สามารถคืนได้</h5>
            <ul>
                <li>สินค้า Pre-Order ที่สั่งผลิตเป็นพิเศษ</li>
                <li>หนังสือหรือสื่อการสอนดิจิทัล</li>
                <li>สินค้าที่ถูกใช้งานแล้วหรือบรรจุภัณฑ์เสียหาย</li>
            </ul>

            <div class="alert alert-warning mt-4" role="alert">
                <i class="bi bi-info-circle-fill"></i>
                <strong>หมายเหตุ:</strong> การคืนเงินจะดำเนินการภายใน 7-14 วันทำการหลังจากเราได้รับและตรวจสอบสินค้าแล้ว
            </div>
        </div>
    </div>
</div>
@endsection