@extends('layouts.app')
@section('title', 'PRE-ORDER')
@section('content')
    <div class="container py-5">

        <a href="{{ route('shop.index') }}" class="btn-back mb-4">
            <i class="bi bi-arrow-left"></i> ย้อนกลับ
        </a>

        <div class="row gy-4">
            {{-- LEFT: Main image + thumbnails --}}
            <div class="col-md-6 text-center  ">
                <div class="zoom-container">
                    {{-- give it an id so we can swap it via JS --}}
                    <img id="mainImage" src="{{ asset($product['image']) }}" class="img-fluid rounded product-image"
                        style="max-height:400px; object-fit:cover;" alt="{{ $product['title'] }}">
                    <div class="zoom-lens" id="zoomLens"></div>
                </div>
                {{-- thumbnails gallery --}}
                <div class="mt-3 d-flex justify-content-center gap-2">
                    @foreach ($product['images'] as $image)
                        <img src="{{ asset($image) }}" class="img-thumbnail"
                            style="width:80px; height:80px; object-fit:cover; cursor:pointer;"
                            onclick="document.getElementById('mainImage').src='{{ asset($image) }}'" alt="thumbnail">
                    @endforeach
                </div>
            </div>

            {{-- RIGHT: Details --}}
            <div class="col-md-6">
                <h2>{!! nl2br(e($product['title'])) !!}</h2>
                <p class="text-muted">ขนาด/น้ำหนัก: {{ $product['size'] }}</p>
                <h3 class="text-pink">฿{{ number_format($product['price'], 2) }}</h3>

                <form action="{{ route('cart.add') }}" method="POST" class="mt-3 d-flex align-items-center">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                    <input type="number" name="qty" value="1" min="1" class="form-control w-auto me-3">
                    <input type="hidden" name="title" value="{{ $product['title'] }}">
                    <input type="hidden" name="price" value="{{ $product['price'] }}">
                    <input type="hidden" name="img" value="{{ $product['image'] }}">
                    <button class="btn btn-pink me-2">
                        <i class="bi bi-cart-fill"></i> เพิ่มในตะกร้า
                    </button>
                </form>

                {{-- Your product description --}}
                <h5 class="mt-4">รายละเอียดสินค้า</h5>
                <p>{{ $product['description'] ?? 'ไม่มีรายละเอียดเพิ่มเติม' }}</p>
            </div>
        </div>

        {{-- RELATED PRODUCTS --}}
        @if ($related->isNotEmpty())
            <h4 class="mt-5 mb-3">สินค้าที่เกี่ยวข้อง</h4>
            <div class="row gx-3 gy-4">
                @foreach ($related as $r)
                    <div class="col-4 col-md-3">
                        <a href="{{ route('shop.show', $r->id) }}" class="text-decoration-none">
                            <x-product-card :img="$r->image" :title="$r->title" :price="$r->price" :size="$r->size"
                                :item-class="'h-100'" />
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="{{ asset('js/show-product.filter.js') }}"></script>
@endsection
