<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subcategory;
use Illuminate\Support\Str;

class AddSubc extends Component
{
    public $name;
    public $subc;

    public function update($inputs)
    {
        $this->validateOnly($inputs,[
           'name'=>'required',
        ]);
    }

    public function storeSubc()
    {
        $this->validate([
            'name' => 'required',
        ]);

        $category = new Subcategory();
        $category->name = $this->name;
        $category->save();
        session()->flash('message','New sub-category has been created !');
    }
    public function render()
    {
        return view('livewire.admin.add-subc');
    }
}
