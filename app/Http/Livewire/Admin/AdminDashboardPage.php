<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Payment;
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
        $totalUser = User::where('utype','USER')->count();

        $todayDate = Carbon::now()->format('Y-m-d');
        $monthDate = Carbon::now()->format('Y-m');
        $yearDate = Carbon::now()->format('Y-m-d');

        $todaySale = Payment::whereDate('created_at',$todayDate)->sum('amount');
        $monthSale = Payment::whereMonth('created_at',$monthDate)->sum('amount');
        $yearSale = Payment::whereYear('created_at',$yearDate)->sum('amount');

        $todayOrder = Payment::whereDate('created_at',$todayDate)->count('amount');
        $monthOrder = Payment::whereMonth('created_at',$monthDate)->count('amount');
        $yearOrder = Payment::whereYear('created_at',$yearDate)->count('amount');

        // $orders = Payment::all();

        $selectDate=$this->getDateFilter();

        $sale = 0;
        
        if ($this->month) {
        $selectedMonth = Carbon::createFromFormat('Y-m', $this->month)->format('m');
        $selectedYear = Carbon::createFromFormat('Y-m', $this->month)->format('Y');

        $orders = Payment::whereMonth('created_at', $selectedMonth)
            ->whereYear('created_at', $selectedYear)
            ->get();
        } 
        else if($this->date){
            $selectDate = Carbon::createFromFormat('Y-m-d', $this->date)->format('Y-m-d');
            $orders = Payment::whereDate('created_at', $selectDate)->get();
        
        }
        else if($this->year){
            $selectedYear = $this->year;
            $orders = Payment::whereYear('created_at', $selectedYear)->get();
        }
        else {
            $orders = Payment::whereDate('created_at', $selectDate)->get();
            
        }
      

        return view('livewire.admin.admin-dashboard-page', compact('totalUser','todaySale','monthSale','yearSale', 
        'todayOrder','monthOrder','yearOrder','orders','selectDate','sale'));

    }


}

