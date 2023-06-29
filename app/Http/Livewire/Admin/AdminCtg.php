<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination; 
use App\Models\Category;

class AdminCtg extends Component
{
    public $ctgId;
    use WithPagination;

 
    public function deleteCtg()
    {   
        $category = Category::find($this->ctgId);

        if ($category) {
            $category->delete();
            session()->flash('message', 'Category has been deleted!');
        } 
        else {
            session()->flash('message', 'Category not found!');
        }
    }


    public function render()
    {
        $categories = Category::orderBy('name','ASC')->paginate(5);
        return view('livewire.admin.admin-ctg',['categories'=>$categories]);
    }
}
