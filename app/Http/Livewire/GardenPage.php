<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Pagination\Paginator;
use Gloudemans\ShoppingCart\Facades\Cart;

class GardenPage extends Component
{
    public $pageSize = 12;
    public $minValue = 0;
    public $maxValue = 100;

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }

    public function render()
    {
         $products = Product ::paginate(12);
         return view('livewire.garden-page',['products'=>$products]);
    }
}
