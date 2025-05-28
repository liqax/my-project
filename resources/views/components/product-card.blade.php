                    <!-- Card  -->
                            <div class="col-auto {{ $itemClass }}"data-category="{{ $category }}">
                                <div class="card product-card">
                                    <div class="position-relative">
                                        <img src="{{ asset($img) }}" class="card-img-top" alt="{{ $title }}">


                                    </div>
                                    <div class="card-body">
                                        <p class="card-text product-title">
                                           {!! nl2br(e($title)) !!} </p>
                                        <span class="product-price">฿{{ number_format($price, 2) }}</span>
                                    </div>
                                    <div class="card-footer text-center">
                                        <button class="btn btn-pink btn-sm">
                                            <i class="bi bi-cart-fill"></i> เพิ่มสินค้า
                                        </button>
                                        <button class="btn btn-heart">
                                            <i class="bi bi-heart-fill"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>