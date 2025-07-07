@extends('layouts.app')
@section('title', 'PRE-ORDER')

@section('content')
  
    <div class="container py-5">
        {{-- แถวที่ 1: หัวข้อ --}}
        <div class="row mb-4">
            <div class="col-12 text-center mb-4">
                <h1 class="display-5 fw-bold">เกี่ยวกับเรา</h1>
                <p class="text-muted">ศึกษาภัณฑ์พาณิชย์</p>
            </div>
        </div>

        {{-- แถวที่ 2: ข้อความด้านซ้าย + รูปภาพด้านขวา --}}
        <div class="row align-items-center mb-5">
            {{-- คอลัมน์ซ้าย: ข้อความ --}}
            <div class="col-lg-6 mb-4 mb-lg-0">
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                    Lorem Ipsum has been the industry’s standard dummy text ever since the
                    1500s, when an unknown printer took a galley of type and scrambled it to
                    make a type specimen book.
                </p>
                <p>
                    It has survived not only five centuries, but also the leap into electronic
                    typesetting, remaining essentially unchanged. It was popularised in the
                    1960s with the release of Letraset sheets containing Lorem Ipsum passages,
                    and more recently with desktop publishing software like Aldus PageMaker
                    including versions of Lorem Ipsum.
                </p>
            </div>

            {{-- คอลัมน์ขวา: รูปภาพ --}}
            <div class="col-lg-6 text-center">
                <img src="/img/sample-2.jpg" alt="เกี่ยวกับเรา" class="img-fluid rounded shadow-sm">
            </div>
        </div>

        {{-- แถวที่ 3: แผนที่ด้านซ้าย + ข้อมูลติดต่อด้านขวา --}}
        <div class="row">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <div class="ratio ratio-16x9 shadow-sm rounded">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.2069973004975!2d100.53667571536204!3d13.782583190439258!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x311d64a0b5b6e5f9%3A0x48f78c280ca35519!2z4Lit4LiE4Liy4Lil4Lij4LiZ4LmA4Lit4Li44Lii4Liy4Lij4Liw!5e0!3m2!1sth!2sth!4v1688734722483!5m2!1sth!2sth"
                        style="border:0;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

            {{-- คอลัมน์ขวา: ข้อมูลการติดต่อ --}}
            <div class="col-lg-6">
                <h5 class="fw-bold mb-3">ช่องทางการติดต่อ Pre-Order</h5>

                <div class="d-flex align-items-center mb-3">
                    <span class="me-2 fs-4 text-success">
                        <i class="bi bi-line"></i>
                    </span>
                    <div>
                        <span class="fw-semibold">LINE:</span>
                        <span> @example_line_id</span>
                    </div>
                </div>

                <div class="d-flex align-items-center mb-4">
                    <span class="me-2 fs-4 text-primary">
                        <i class="bi bi-telephone-fill"></i>
                    </span>
                    <div>
                        <span class="fw-semibold">TEL:</span>
                        <span> 02-123-4567</span>
                    </div>
                </div>

                <h6 class="fw-bold">ข้อมูลบริษัท</h6>
                <p class="small mb-1">
                    บริษัท พรี-ออร์เดอร์ จำกัด<br>
                    123/45 ซอยย่านตลาดบางกอก, แขวงยานนาวา, เขตสาทร, กรุงเทพมหานคร
                </p>
                <p class="small mb-1">
                    โทร: 02-123-4567<br>
                    อีเมล: contact@preorder-shop.co.th
                </p>
                <p class="small mb-0">
                    เวลาทำการ: จันทร์ – เสาร์ 08:00 – 16:00 น.
                </p>
            </div>
        </div>
    </div>
@endsection
