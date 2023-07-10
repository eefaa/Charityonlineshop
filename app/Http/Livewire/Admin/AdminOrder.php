<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithPagination; 
use App\Models\Order;  

class AdminOrder extends Component
{ 
    use WithPagination;
    public $orderId;
    public $status;
    public $tracking_no = [];
  

    public function updateStatus($orderId, $evt_status)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $evt_status;
        $order->save();
    }

    public function updatetracking($orderId)
    {
        $order = Order::find($orderId);
        $order->tracking_no = $this->tracking_no[$orderId];
        $order->save();
     
    }

    public function editOrder($orderId)
    {
        $this->orderId = $orderId;
    }


    public function render()
    {
        $orders = Order::paginate(10);
        return view('livewire.admin.admin-order',compact('orders'));
    }
}
