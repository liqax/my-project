



<!-- Card  -->
<div class="col-auto  {{ $itemClass }}" data-variety="{{ $variety }}" data-price="{{ $price }}">
    <div class="card product-card  product-item " data-category="{{ $category }}" data-price="{{ $price }}">

        <div class="position-relative">
            <img src="{{ asset($img) }}" class="card-img-top" alt="{{ $title }}">

        </div>
        <div class="card-body">
            <p class="card-text product-title">
                {!! nl2br(e($title)) !!} </p>
            <span class="product-price">฿{{ number_format($price, 2) }}</span>
        </div>
        <div class="card-footer text-center">
            <form action="{{ route('cart.add') }}" method="POST" class="d-inline-block">
                @csrf
                {{-- ซ่อนค่าเพื่อส่งไปยัง Controller --}}
                
                <input type="hidden" name="title" value="{{ $title }}">
                <input type="hidden" name="price" value="{{ $price }}">
                <input type="hidden" name="img" value="{{ $img }}">
                <input type="hidden" name="qty" value="1">
                <button class="btn btn-pink btn-sm">
                    <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                </button>
            </form>
            <form action="{{ route('wishlist.add') }}" method="POST" class="d-inline">
                @csrf

                <button class="btn btn-heart">
                    <i class="bi bi-heart-fill"></i>
                </button>
            </form>

        </div>
    </div>
</div>
