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
        if (file_exists('asset/imgs/products/'.$product->img)) {
            unlink('asset/imgs/products/'.$product->img);
        }
        $product->delete();
        session()->flash('message','Product has been deleted !');
    }
    public function render()
    {
        $products = Product::orderBy('created_at','DESC')->paginate(43);
        return view('livewire.admin.admin-product',['products'=>$products]);
    }
}
