<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class SearchHeader extends Component
{
    public $z;
    public function render()
    {
        return view('livewire.search-header');
    }
}
