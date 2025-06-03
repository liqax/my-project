 @extends('layouts.app')
 @section('title', 'products')
 @section('content')
     <!-- HTML -->
     <div class="filter-bar mt-3">
         <!-- ค้นหา -->
         <div class="filter-item">
             <label for="search">ค้นหา</label>
             <div class="search-box">
                 <input type="text" id="search" placeholder="ค้นหา…">
                 <button type="submit" class="search-btn">

                     <img src="/images/search.png" alt="search">

                 </button>
             </div>
         </div>

         <!-- หมวดหมู่สินค้า -->
         <div class="filter-item">
             <label for="category">หมวดหมู่สินค้า</label>
             <select id="category">
                 <option value="all">สินค้าทั้งหมด</option>
                 <option value="books">หนังสือ</option>
                 <option value="kits">อุปกรณ์วิทยาศาตร์</option>
                 <option value="chemecals">สารเคมี</option>
                 <option value="drone">โดรน</option>
             </select>
         </div>

         <!-- ราคาเริ่มต้น -->
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

     <br>
     <div class="row gx-3 gy-4 justify-content-center">

         <!-- หนังสือ Card 1 -->

         <div>
             @php
                 $products = [
                     [
                         'img' => 'img/books/book1.jpg',
                         'title' => "หนังสือวิทยาศาสตร์และเทคโนโลยี\nเล่ม 1 ม.3",
                         'price' => 110.0,
                         'category' => 'books',
                         'class' => 'book-item',
                     ],
                     [
                         'img' => 'img/books/book2.jpg',
                         'title' => " หนังสือกุญชาญาณ เพื่อส่งเสริม\nอัจฉริยภาพคณิตศาสตร์สำหรับเด็ก",
                         'price' => 140.0,
                         'category' => 'books',
                         'class' => 'book-item',
                     ],
                     [
                         'img' => 'img/books/book3.jpg',
                         'title' => ' หนังสือ เสริมทักษะ อัจฉริยะ ตัวน้อย',
                         'price' => 180.0,
                         'category' => 'books',
                         'class' => 'book-item',
                     ],
                     [
                         'img' => 'img/books/book4.jpg',
                         'title' => 'หนังสือเมฆน้อยสีเทา',
                         'price' => 100.0,
                         'category' => 'books',
                         'class' => 'book-item',
                     ],
                     [
                         'img' => 'img/books/book5.jpg',
                         'title' => ' หนังสือเราเป็นเพื่อนที่ต่อกัน',
                         'price' => 120.0,
                         'category' => 'books',
                         'class' => 'book-item',
                     ],
                     [
                         'img' => 'img/books/book6.jpg',
                         'title' => ' หนังสือพี่ชายที่แสนดี',
                         'price' => 110.0,
                         'category' => 'books',
                         'class' => 'book-item',
                     ],
                     [
                         'img' => 'img/science/1.jpg',
                         'title' => 'แก้วบีกเกอร์',
                         'price' => 250.0,
                         'category' => 'kits',
                         'class' => 'sci-item',
                     ],
                     [
                         'img' => 'img/science/2.jpg',
                         'title' => ' ขวดทดลอง',
                         'price' => 100.0,
                         'category' => 'kits',
                         'class' => 'sci-item',
                     ],
                     [
                         'img' => 'img/science/3.jpg',
                         'title' => ' หลอดทดลอง',
                         'price' => 475.0,
                         'category' => 'kits',
                         'class' => 'sci-item',
                     ],
                     [
                         'img' => 'img/science/4.jpg',
                         'title' => 'ถาดหลุม',
                         'price' => 50.0,
                         'category' => 'kits',
                         'class' => 'sci-item',
                     ],
                     [
                         'img' => 'img/science/5.jpg',
                         'title' => ' กรวยแก้ว',
                         'price' => 85.0,
                         'category' => 'kits',
                         'class' => 'sci-item',
                     ],
                     [
                         'img' => 'img/science/6.jpg',
                         'title' => ' ',
                         'price' => 70.0,
                         'category' => 'kits',
                         'class' => 'sci-item',
                     ],
                     [
                         'img' => 'img/chemistry/1.jpg',
                         'title' => 'Hydrochloric Acid (HCl)',
                         'price' => 65.0,
                         'category' => 'chemecals',
                         'class' => 'che-item',
                     ],
                     [
                         'img' => 'img/chemistry/2.jpg',
                         'title' => ' Sodium Hydroxide (NaOH)',
                         'price' => 80.0,
                         'category' => 'chemecals',
                         'class' => 'che-item',
                     ],
                     [
                         'img' => 'img/chemistry/3.jpg',
                         'title' => ' sulfuric acid',
                         'price' => 80.0,
                         'category' => 'chemecals',
                         'class' => 'che-item',
                     ],
                     [
                         'img' => 'img/chemistry/4.jpg',
                         'title' => 'สารละลายเมทิลเรด',
                         'price' => 75.0,
                         'category' => 'chemecals',
                         'class' => 'che-item',
                     ],
                     [
                         'img' => 'img/chemistry/5.jpg',
                         'title' => 'สารละลายยูนิเวอร์ซัล',
                         'price' => 75.0,
                         'category' => 'chemecals',
                         'class' => 'che-item',
                     ],
                     [
                         'img' => 'img/chemistry/6.jpg',
                         'title' => 'กรดไนตริก เจือจาง 2โมล',
                         'price' => 85.0,
                         'category' => 'chemecals',
                         'class' => 'che-item',
                     ],
                     [
                         'img' => 'img/drone/1.jpg',
                         'title' => 'โดรน GEN1',
                         'price' => 10000.0,
                         'category' => 'drone',
                         'class' => 'drone-item',
                     ],
                     [
                         'img' => 'img/drone/2.jpg',
                         'title' => ' โดรน GEN2',
                         'price' => 12000.0,
                         'category' => 'drone',
                         'class' => 'drone-item',
                     ],
                     [
                         'img' => 'img/drone/3.jpg',
                         'title' => ' โดรน GEN2 LT',
                         'price' => 15000.0,
                         'category' => 'drone',
                         'class' => 'drone-item',
                     ],
                 ];
             @endphp

             <div class="row gx-3 gy-4 justify-content-center">
                 @foreach ($products as $product)
                     <x-product-card :img="$product['img']" :title="$product['title']" :price="$product['price']" :category="$product['category']"
                         :item-class="$product['class']" />
                 @endforeach
             </div>
         </div>


         <br>
         <script src="{{ asset('js/product.filter.js') }}"></script>
     @endsection

