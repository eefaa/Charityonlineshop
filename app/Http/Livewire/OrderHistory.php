<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;


class OrderHistory extends Component
{
    public $orders;

    public function mount()
    {
        // Fetch the order history from the database
        $user = auth()->user();
        $this->orders = Order::where('user_id', $user->id)->get();
    }

    public function render()
    {
        return view('livewire.order-history');
    }
}
