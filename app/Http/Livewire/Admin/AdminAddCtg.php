<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminAddCtg extends Component
{
    public $name;
    public $ctg;

    public function generatectg()
    {
        $this->ctg = Str::slug($this->name);
    }

    public function update($inputs)
    {
        $this->validateOnly($inputs,[
           'name'=>'required',
           'ctg'=>'required' 
        ]);
    }

    public function storeCtg()
    {
        $this->validate([
            'name' => 'required',
            'ctg' => 'required' 
        ]);

        $category = new Category();
        $category->name = $this->name;
        $category->ctg = $this->ctg;
        $category->save();
        session()->flash('message','New category has been created !');
    }
    
    public function render()
    {
        return view('livewire.admin.admin-add-ctg');
    }
}
