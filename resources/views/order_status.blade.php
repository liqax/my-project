@extends('layouts.app')
@section('title', 'สถานะคำสั่งซื้อ')

@section('content')
<div class="container py-4">
    <h2 class="mb-4">สถานะคำสั่งซื้อ</h2>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="alert alert-info">
        ประวัติคำสั่งซื้อของคุณ (Tracking / สถานะจัดส่ง ฯลฯ) จะแสดงที่นี่
        @if (count($orders) > 0)
            @foreach ($orders as $order)
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Order #{{ $order->order_number }}</h5>
                        <p>สถานะ: {{ $order->status }}</p>
                        <p>ยอดรวม: ฿{{ number_format($order->total_amount, 2) }}</p>
                        <a href="{{ route('order.detail', $order->id) }}" class="btn btn-sm btn-info">ดูรายละเอียด</a>
                    </div>
                </div>
            @endforeach
        @else
            <p>คุณยังไม่มีคำสั่งซื้อ</p>
        @endif
    </div>
</div>
@endsection