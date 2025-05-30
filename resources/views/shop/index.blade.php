@extends('layouts.app')
@section('content')
<div class="filter-bar mt-3">
  <div class="filter-item">
    <label for="search">ค้นหา</label>
    <div class="search-box">
      <input type="text" id="search" placeholder="ค้นหา…">
      <button class="search-btn"><img src="{{ asset('images/search.png') }}" alt="search"></button>
    </div>
  </div>

  <div class="filter-item">
    <label for="category">หมวดหมู่สินค้า</label>
    <select id="category">
      <option value="all">สินค้าทั้งหมด</option>
      <option value="books">หนังสือ</option>
      <option value="kits">อุปกรณ์วิทยาศาสตร์</option>
      <option value="chemecals">สารเคมี</option>
      <option value="drone">โดรน</option>
    </select>
  </div>

  <div class="filter-item">
    <label>ราคาเริ่มต้น</label>
    <div class="price-range">
      <input type="number" id="price-min" placeholder="0">
      <span>ถึง</span>
      <input type="number" id="price-max" placeholder="0">
      <span>บาท</span>
    </div>
  </div>
</div>

<div class="container py-5">
  <div id="productRow" class="row gx-4 gy-4 justify-content-start">
    @foreach($products as $id=>$p)
      <div class="col-6 col-md-3">
        <a href="{{ route('shop.show',$id) }}" class="text-decoration-none">
          <x-product-card 
            :img="$p['img']"  
            :title="$p['title']" 
            :price="$p['price']" 
            :category="$p['category']"
            :size="$p['size']" 
            :item-class="'h-100'" 
          />
        </a>
      </div>
    @endforeach
  </div>
</div>
<script src="{{ asset('js/product.filter.js') }}"></script>
@endsection
