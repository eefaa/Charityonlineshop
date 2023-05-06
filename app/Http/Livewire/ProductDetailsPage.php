<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
// use Cart;
use Gloudemans\ShoppingCart\Facades\Cart;

class ProductDetailsPage extends Component
{
    public $ctg;
    public function mount($ctg)
    {
        $this->ctg = $ctg;
    }
    public function store($product_id,$product_name,$product_price)
    {
        Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
    public function render()
    {
        $product = Product::where('ctg',$this->ctg)->first();
        // $rproducts = Product::where('ctgId',$product->ctgId)->inRandomOrder()->limit(4)->get();
        // $nproducts = Product::latest()->take(4)->get();
        return view('livewire.product-details-page',['product'=>$product]);
    }
}
