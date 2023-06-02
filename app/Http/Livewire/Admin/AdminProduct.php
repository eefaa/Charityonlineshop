<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination; 
use App\Models\Category;
use App\Models\Product;

class AdminProduct extends Component
{
    use WithPagination;
    public $productId;

    public function deleteP()
    {
        $product = Product::find($this->productId);
        unlink('asset/imgs/products/'.$product->image);
        $product->delete();
        session()->flash('message','Product has been deleted !');
    }
    public function render()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(10);
        return view('livewire.admin.admin-product',['products'=>$products]);
    }
}
