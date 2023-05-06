<?php

namespace App\Http\Livewire;
use Cart;

use Livewire\Component;

class CartPage extends Component
{
    public function increaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);

    }
    public function decreaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);

    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
