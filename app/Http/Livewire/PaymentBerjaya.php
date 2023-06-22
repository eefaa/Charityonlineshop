<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;
use Cart;

class PaymentBerjaya extends Component
{
    public $order_id;

    public function mount ($order_id)
    {
        $this->order_id = $order_id;
    }

    public function render()
    {
        $order = Order::find($this->order_id);
        $order->status = "To Ship";
        $order->save();
        Cart::destroy();
        
        return view('livewire.payment-berjaya');
    }
}
