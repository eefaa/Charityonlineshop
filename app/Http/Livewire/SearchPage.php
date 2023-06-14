<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Component;
use Cart;

class SearchPage extends Component
{
    use WithPagination;

    public $itmSize = 12;
    public $orderBy;
    public $z;
    public $cari;
    
   
    public function mount()
    {
        $this->fill(request()->only('z'));
        $this->cari = '%' . $this->z . '%';
    }

    public function render()
    {
      if ($this->orderBy == 'Price: Low to High') {
            $products = Product::where('name', 'like', $this->cari)->orderBy('oriPrice', 'ASC')->paginate($this->itmSize);
            dd($products);
        } else if ($this->orderBy == 'Price: High to Low') {
            $products = Product::where('name', 'like', $this->cari)->orderBy('oriPrice', 'DESC')->paginate($this->itmSize);
            dd($products);
        } else if ($this->orderBy == 'Latest Item') {
            $products = Product::where('name', 'like', $this->cari)->orderBy('created_at', 'DESC')->paginate($this->itmSize);
            dd($products);
        } else {
            $products = Product::where('name', 'like', $this->cari)->paginate($this->itmSize);
        }

        $categories = Category::orderBy('name', 'ASC')->get();
        $message = '';


        if ($products->isEmpty()) {
            $message = "No items found.";
    
        }
        return view('livewire.search-page', ['products'=>$products,'categories' => $categories,'message' => $message]);
    }
}
