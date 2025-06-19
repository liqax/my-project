@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')
    <div class="container py-4">
        {{-- หัวข้อ --}}
        <h2 class="mb-4">ประวัติคำสั่งซื้อ</h2>
        <div class="row align-items-start ">
            <div class="row row-grid">

                {{-- เมนูด้านซ้าย --}}
                 <div class=" sidebar ">
                    <a href="/customer/account">บัญชีของฉัน</a>
                    <a href="/orders/sale">คำสั่งซื้อของคุณ</a>
                    <a href="/wishlist">รายการโปรดของคุณ</a>
                    <a href="/customer/address">ข้อมูลที่อยู่จัดส่ง</a>
                    <a href="/orders/history"class="fw-bold text-pink">ประวัติคำสั่งซื้อ</a>
                    <a href="/billing/account">ยืนยันการชำระเงิน</a>
                    <a href="/customer/gdpr">นโยบายความเป็นส่วนตัว</a>
                </div>
            </div>

            <div class="product-grid wishlist md-2  ">
                <div class="container-flude py-5 ms-5 md-5 ml-5">
                    {{-- ฟอร์มกรองข้อมูล --}}
                    <form action="{{ route('orders.history') }}" method="GET" class="row g-3 align-items-end mb-4">
                        {{-- เลือกสถานะ --}}
                        <div class="col-auto">
                            <label for="status" class="form-label">สถานะ</label>
                            <select name="status" id="status" class="form-select">
                                @foreach ($statusList as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ $filterStatus === (string) $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- เลือกเดือน --}}
                        <div class="col-auto">
                            <label for="month" class="form-label">เดือน</label>
                            <select name="month" id="month" class="form-select">
                                @foreach ($monthList as $key => $label)
                                    <option value="{{ $key }}"
                                        {{ (string) $filterMonth === (string) $key ? 'selected' : '' }}>
                                        {{ $label }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- ปุ่มค้นหา --}}
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-funnel-fill me-1"></i> กรอง
                            </button>
                        </div>

                        {{-- ปุ่มล้างการกรอง --}}
                        <div class="col-auto">
                            <a href="{{ route('orders.history') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-clockwise me-1"></i> รีเซ็ต
                            </a>
                        </div>
                    </form>

                    {{-- ตารางแสดงรายการสั่งซื้อ --}}
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">วันที่</th>
                                    <th scope="col">สินค้า</th>
                                    <th scope="col">ราคา/ชิ้น (฿)</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col" class="text-end">รวม (฿)</th>
                                    <th scope="col">สถานะ</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orders as $order)
                                    @php
                                        // คำนวณยอดรวม = price × qty
                                        $total = $order['price'] * $order['qty'];
                                    @endphp
                                    <tr>
                                        <td>{{ $order['id'] }}</td>
                                        <td>{{ date('d/m/Y', strtotime($order['date'])) }}</td>
                                        <td>{{ $order['product'] }}</td>
                                        <td>{{ number_format($order['price'], 2) }}</td>
                                        <td>{{ $order['qty'] }}</td>
                                        <td class="text-end">{{ number_format($total, 2) }}</td>
                                        <td>
                                            @switch($order['status'])
                                                @case('processing')
                                                    <span class="badge bg-warning text-dark">กำลังดำเนินการ</span>
                                                @break

                                                @case('shipped')
                                                    <span class="badge bg-success">จัดส่งแล้ว</span>
                                                @break

                                                @case('cancelled')
                                                    <span class="badge bg-danger">ยกเลิกแล้ว</span>
                                                @break

                                                @default
                                                    <span class="badge bg-secondary">{{ $order['status'] }}</span>
                                            @endswitch
                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted py-4">
                                                ไม่มีข้อมูลคำสั่งซื้อในระบบ
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>

                                {{-- สรุปยอดสุทธิ --}}
                                @if (count($orders))
                                    <tfoot>
                                        @php
                                            $grandTotal = collect($orders)->sum(fn($o) => $o['price'] * $o['qty']);
                                        @endphp
                                        <tr class="table-light">
                                            <th colspan="5" class="text-end">ยอดสุทธิทั้งหมด</th>
                                            <th class="text-end">฿{{ number_format($grandTotal, 2) }}</th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
