<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $img;
    public $title;
    public $price;
    public $category;
    public $itemClass; 
    /**
     * @param string $img       // path รูป
     * @param string $title     // ชื่อสินค้า
     * @param float  $price     // ราคาสินค้า
     * @param string $category  // category สำหรับ data-attribute
     * @param string $itemClass
     */
    public function __construct($img, $title, $price, $category = '',$itemClass = '')
    {
        $this->img      = $img;
        $this->title    = $title;
        $this->price    = $price;
        $this->category = $category;
        $this->itemClass = $itemClass;
    }

    public function render()
    {
        return view('components.product-card');
    }
}
