@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">ตะกร้าสินค้า</h4>
    @forelse ($cart as $item)
        <div class="border-bottom py-2">
            <strong>{{ $item['title'] }}</strong><br>
            จำนวน: {{ $item['qty'] }} × ฿{{ number_format($item['price'], 2) }}<br>
            รวม: ฿{{ number_format($item['qty'] * $item['price'], 2) }}
        </div>
    @empty
        <p class="text-muted">ไม่มีสินค้าในตะกร้า</p>
    @endforelse
</div>
@endsection
