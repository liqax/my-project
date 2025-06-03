@extends('layouts.app')

@section('content')
  <div class="container">
    <h2 class="mb-4">รายการโปรด (Wishlist)</h2>

    @php
      // ตัวแปร $items มาจาก ShopController::viewWishlist()
      // ซึ่งเป็น array ของสินค้าที่อยู่ใน wishlist
      $items = $items ?? [];
    @endphp

    @if(count($items))
      <div class="row g-4">
        @foreach($items as $item)
          <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
              <img src="{{ asset($item['img']) }}" class="card-img-top" alt="{{ $item['title'] }}"
                   style="height: 200px; object-fit: cover;">
              <div class="card-body d-flex flex-column">
                <h6 class="card-title">{!! nl2br(e($item['title'])) !!}</h6>
                <p class="text-pink fw-bold mb-3">฿{{ number_format($item['price'], 2) }}</p>

                <div class="mt-auto">
                  <a href="{{ route('shop.show', $item['id']) }}" class="btn btn-outline-secondary btn-sm w-100 mb-2">
                    ดูรายละเอียด
                  </a>

                  <form action="{{ route('wishlist.remove') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                    <button type="submit" class="btn btn-sm btn-outline-danger w-100">
                      <i class="bi bi-trash-fill me-1"></i> ลบออก
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    @else
      <div class="alert alert-secondary text-center">
        คุณยังไม่มีสินค้าในรายการโปรด.
      </div>
    @endif
  </div>
@endsection
