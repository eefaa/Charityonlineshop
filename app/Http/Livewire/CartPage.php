<?php

namespace App\Http\Livewire;
use Cart;


use Livewire\Component;

class CartPage extends Component
{
    public function store(){
        dd('laluu');
    }

    public function increaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon');

    }
    public function decreaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon');

    }
    public function destroy($id)
    {
        Cart::remove ($id);
        $this->emitTo('cart-icon');
        session()->flash('Success_message','Item has been removed!');
    }
    public function clear()
    {
        Cart::destroy();
        $this->emitTo('cart-icon');
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
