<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\WithPagination; 

class AdminDashboardPage extends Component
{
    use WithPagination;
    public $date;
    public $month;
    public $year;
    public $sale;

    public function getDateFilter()
    {
        $date = Carbon::now();
        return $date->format('Y-m-d');
    }


    public function render()
    {
        // $totalUser = User::where('utype','USER')->count();

        $todayDate = Carbon::now()->format('Y-m-d');
        $monthDate = Carbon::now()->format('m');
        $yearDate = Carbon::now()->format('Y');

        $todaySale = Order::whereDate('created_at',$todayDate)->sum('subtotal');
        $monthSale = Order::whereMonth('created_at',$monthDate)->sum('subtotal');
        $yearSale = Order::whereYear('created_at',$yearDate)->sum('subtotal');

        $todayOrder = Order::whereDate('created_at',$todayDate)->count('subtotal');
        $monthOrder = Order::whereMonth('created_at',$monthDate)->count('subtotal');
        $yearOrder = Order::whereYear('created_at',$yearDate)->count('subtotal');

        // $orders = Payment::all();

        $selectDate=$this->getDateFilter();

        $sale = 0;
        
        if ($this->month) {
        $selectedMonth = Carbon::createFromFormat('Y-m', $this->month)->format('m');
        $selectedYear = Carbon::createFromFormat('Y-m', $this->month)->format('Y');

        $orders = Order::whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->get();
        } 
        else if($this->date){
           
            $selectDate = Carbon::createFromFormat('Y-m-d', $this->date)->format('Y-m-d');
            $orders = Order::whereDate('created_at', $selectDate)->get();
            
           
        }
        else if($this->year){
            $selectedYear = $this->year;
            $orders = Order::whereYear('created_at', $selectedYear)->get();
        }
        else {
            $orders = Order::whereDate('created_at', $selectDate)->get();
            
        }
      

        return view('livewire.admin.admin-dashboard-page', compact('todaySale','monthSale','yearSale', 
        'todayOrder','monthOrder','yearOrder','orders','selectDate','sale'));

    }


}

