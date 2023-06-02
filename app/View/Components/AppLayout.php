<?php

namespace App\View\Components;

use Illuminate\View\Component;
// use Livewire\Component;
use App\Models\Category;

class AppLayout extends Component
{
  

    public function render()
    {
        $categories = Category::where('name', "Women's Clothing")->get();
        // return view('layouts.app',compact('categories'));
        return view('layouts.app')
            ->with('categories', $categories);
    }
}
