<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;    
use Illuminate\Pagination\Paginator;
use Livewire\Component;
// use Gloudemans\ShoppingCart\Facades\Cart;   // use Cart;

class SearchPage extends Component
{
    use WithPagination;
    public $itmSize = 12;  
    public $minValue = 0;
    public $maxValue = 100;
    public $orderBy = "Default Sorting";

    public $z;
    public $cari;

    // public function store($product_id,$product_name,$product_price)
    // {
    //     // Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
    //     Cart::add($product_id,$product_name,1,$product_price);
    //     session()->flash('success_message','Item added in Cart');
    //     return redirect()->route('product.cart');
    // }
    public function mount()
    {
        $this->fill(request()->only('z'));
        $this->cari = '%'.$this->z . '%';
    }

    public function changeSort($itm)
    {
        $this->orderBy = $itm;
    } 

    public function changeItmSize($size)
    {
        $this->itmSize = $size;
    }

    public function render()
    {
        if($this->orderBy == 'Price: Low to High')
        {
            $products = Product::where('name','like',$this->cari)->orderBy('oriPrice','ASC')->paginate($this->itmSize);;
        }
        else if($this->orderBy == 'Price: High to Low') 
        {
            $products = Product::where('name','like',$this->cari)->orderBy('oriPrice','DESC')->paginate($this->itmSize);
        }
        else if($this->orderBy == 'Latest Item')
        {
            $products = Product::where('name','like',$this->cari)->orderBy('created_at','DESC')->paginate($this->itmSize);
        }
        else
        {
            $products = Product ::paginate($this->itmSize);
        }
        // $products = Product::paginate();
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.search-page',['products'=>$products, 'categories'=>$categories]);
        // return view('livewire.product-page');
    }
}
