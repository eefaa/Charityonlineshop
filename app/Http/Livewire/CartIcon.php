<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class CartIcon extends Component
{
    protected $panggil = ['refreshPage'=>'$refresh'];
    public function render()
    {
        return view('livewire.cart-icon');
    }
}
