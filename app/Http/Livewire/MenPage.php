<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Gloudemans\ShoppingCart\Facades\Cart;

class MenPage extends Component
{
    public $pageSize = 12;
    public $minValue = 0;
    public $maxValue = 100;
    public $ctg;

    public function utkctg($ctg)
    {
        $this->ctg = $ctg;
    }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function render()
    {
        $category = Category::where('ctg',this->ctg)->first();
        $ctgName = $category->name;
        $ctgId = $category->id;
        $products = Product ::paginate(12);
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.men-page',['products'=>$products,'categories'=>$categories]);

    }
}

