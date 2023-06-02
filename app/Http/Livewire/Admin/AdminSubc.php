<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination; 
use App\Models\Subcategory;

class AdminSubc extends Component
{
    public $subcId;
    use WithPagination;

    public function deleteSubc()
    {   
        $subc = Subcategory::find($this->subcId);

        if ($subc) {
            $subc->delete();
            session()->flash('message', 'Category has been deleted!');
        } 
        else {
            session()->flash('message', 'Category not found!');
        }
    }

    public function render()
    {
        $subcategories = Subcategory::orderBy('subc','ASC')->paginate(5);
        return view('livewire.admin.admin-subc',['subcategories'=>$subcategories]);
    }
}
