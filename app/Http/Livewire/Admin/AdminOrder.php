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
    public $tracking_no;
  


    public function updateStatus($orderId, $evt_status)
    {
        $order = Order::findOrFail($orderId);
        $order->status = $evt_status;
        $order->save();
    }

    public function updatetracking($orderId)
    {
        $this->validate([
            'tracking_no' => 'required'
            
        ]);
        
        $order = Order::find($this->orderId);
        if ($order) {
            $order->tracking_no = $this->tracking_no;
            $order->save();
           
        } else {
            session()->flash('error', 'Order not found. Unable to update tracking number.');
            
        }
        
    }

    public function render()
    {
        $orders = Order::paginate(10);
        return view('livewire.admin.admin-order',compact('orders'));
    }
}
