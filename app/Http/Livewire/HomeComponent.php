<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $product = Product::find(1); 
        return view('livewire.home-component',['product'=>$product]);
    }
}
