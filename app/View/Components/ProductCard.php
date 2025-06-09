<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{   
    public $id;
    public $img;
    public $title;
    public $price;
    public $category;
    public $size;
    public $itemClass; 
    public $variety;
    /**
     * @param float $id
     * @param string $img       // path รูป
     * @param string $title     // ชื่อสินค้า
     * @param float  $price     // ราคาสินค้า
     * @param string $category  // 
     * @param float  $size
     * @param string $itemClass // class-item
     * @param string $variety // ประเภทสินค้า
     */
    public function __construct($img, $title, $price, $category = '',$size='',$itemClass = '',$variety='all',$id='')
    {
        $this->id       =$id;
        $this->img      = $img;
        $this->title    = $title;
        $this->price    = $price;
        $this->category = $category;
        $this->size = $size;    
        $this->itemClass = $itemClass;
        $this->variety = $variety;
    }

    public function render()
    {
        return view('components.product-card');
    }
}
