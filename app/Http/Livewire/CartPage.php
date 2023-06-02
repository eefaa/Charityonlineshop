<?php

namespace App\Http\Livewire;
use Cart;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use Livewire\Component;

class CartPage extends Component
{
    public function checkout()
    {
        $provider = new PayPalClient;
        $token = $provider->getAccessToken();
        $provider->setAccessToken($token);

        $order = $provider->createOrder([
            "intent" => "CAPTURE",
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => 'USD'
                        // 'value' => $this->total
                    ]
                ]
            ],
            'application_context' => [
                'cancel_url' => route('payment.cancel'),
                'return_url' => route('payment.success')
            ]
        ]);
        dd($order);
    }


    public function increaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty + 1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon','refreshPage');

    }
    public function decreaseQty($rowId)
    {
        $product = Cart::get($rowId);
        $qty = $product->qty - 1;
        Cart::update($rowId,$qty);
        $this->emitTo('cart-icon','refreshPage');

    }
    public function destroy($id)
    {
        Cart::remove ($id);
        $this->emitTo('cart-icon','refreshPage');
        session()->flash('Success_message','Item has been removed!');
    }
    public function clear()
    {
        Cart::destroy();
        $this->emitTo('cart-icon','refreshPage');
    }
    public function render()
    {
        return view('livewire.cart-page');
    }
}
