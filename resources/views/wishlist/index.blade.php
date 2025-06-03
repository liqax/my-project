@extends('layouts.app') {{-- หรือ layout ของคุณ --}}

@section('content')
<div class="container py-5">
    <h2 class="mb-4">รายการโปรดของคุณ</h2>

    @forelse($wishlist as $item)
        <div class="mb-3">
            <div class="card p-3">
                <p class="mb-0">สินค้า ID: {{ $item }}</p>
            </div>
        </div>
    @empty
        <p>ยังไม่มีสินค้าในรายการโปรด</p>
    @endforelse
</div>
@endsection
