<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;    
use Livewire\Component;
use Illuminate\Http\Request;
// use Gloudemans\ShoppingCart\Facades\Cart;
use Cart;

class ProductPage extends Component
{
    use WithPagination;
    public $itmSize = 12;  
    public $minValue = 0;
    public $maxValue = 1000;
    public $orderBy = "Default Sorting";

    public function changeSort($itm)
    {
        $this->orderBy = $itm;
    } 

    public function changeItmSize($size)
    {
        $this->itmSize = $size;
    }

    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()-> flash('Success message','Item added in Cart');
        return redirect()->route('product.cart');
    }

    public function render()
    {
        if($this->orderBy == 'Price: Low to High')
        {
            $products = Product::whereBetween('oriPrice',[$this->minValue,$this->maxValue])->orderBy('oriPrice','ASC')->paginate($this->itmSize);
        }
        else if($this->orderBy == 'Price: High to Low') 
        {
            $products = Product::whereBetween('oriPrice',[$this->minValue,$this->maxValue])->orderBy('oriPrice','DESC')->paginate($this->itmSize);
        }
        else if($this->orderBy == 'Latest Item')
        {
            $products = Product::whereBetween('oriPrice',[$this->minValue,$this->maxValue])->orderBy('created_at','DESC')->paginate($this->itmSize);
        }
        else
        {
            $products = Product ::paginate($this->itmSize);
        }
        
        $categories = Category::orderBy('name','ASC')->get();
        // $categories = Category::where('ctg',$this->ctg)->first();
        
        return view('livewire.product-page', [
            'products' => $products,
            'categories' => $categories,

        ]);
       
    }
}
