@extends('layouts.app')
@section('content')
<div class="container py-5">
  <!-- ปุ่ม Back  -->
  <a href="{{ route('shop.index') }}" class="btn-back mb-4">
    <i class="bi bi-arrow-left"></i> ย้อนกลับ
  </a>


  <div class="row gy-4">
    {{-- LEFT: Main image + thumbnails --}}
    <div class="col-md-6 text-center">
      {{-- give it an id so we can swap it via JS --}}
      <img
        id="mainImage"
        src="{{ asset($product['img']) }}"
        class="img-fluid rounded"
        style="max-height:400px; object-fit:cover;"
        alt="{{ $product['title'] }}"
      >

      {{-- thumbnails gallery --}}
      <div class="mt-3 d-flex justify-content-center gap-2">
        @foreach($product['images'] as $img)
          <img
            src="{{ asset($img) }}"
            class="img-thumbnail"
            style="width:80px; height:80px; object-fit:cover; cursor:pointer;"
            onclick="document.getElementById('mainImage').src='{{ asset($img) }}'"
            alt="thumbnail"
          >
        @endforeach
      </div>
    </div>

    {{-- RIGHT: Details --}}
    <div class="col-md-6">
      <h2>{!! nl2br(e($product['title'])) !!}</h2>
      <p class="text-muted">ขนาด/น้ำหนัก: {{ $product['size'] }}</p>
      <h3 class="text-pink">฿{{ number_format($product['price'],2) }}</h3>

      <form action="{{ route('cart.add') }}" method="POST" class="mt-3 d-flex align-items-center">
        @csrf
        <input type="hidden" name="id" value="{{ $product['id'] }}">
        <input type="number" name="qty" value="1" min="1" class="form-control w-auto me-3">
        <button class="btn btn-pink me-2">
          <i class="bi bi-cart-fill"></i> เติมตะกร้า
        </button>
      </form>

      {{-- Your product description --}}
      <h5 class="mt-4">รายละเอียดสินค้า</h5>
      <p>{{ $product['description'] ?? 'ไม่มีรายละเอียดเพิ่มเติม' }}</p>
    </div>
  </div>

  {{-- RELATED PRODUCTS --}}
  @if($related->isNotEmpty())
    <h4 class="mt-5 mb-3">สินค้าที่เกี่ยวข้อง</h4>
    <div class="row gx-3 gy-4">
      @foreach($related as $rid => $r)
        <div class="col-4 col-md-3">
          <a href="{{ route('shop.show',$rid) }}" class="text-decoration-none">
            <x-product-card
              :img="$r['img']"
              :title="$r['title']"
              :price="$r['price']"
              :size="$r['size']"
              :item-class="'h-100'"
            />
          </a>
        </div>
      @endforeach
    </div>
  @endif
</div>
@endsection
