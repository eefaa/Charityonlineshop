<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Subategory;
use Illuminate\Support\Str;

class EditSubc extends Component
{
    public $subcId;
    public $name;
    public $subc;

    public function update($usrinputs)
    {
        $this->validateOnly($usrinputs,[
           'name'=>'required'
         
        ]);
    }
    
    public function mount($subcId)
    {
        $subcategory = Subcategory::find($subcId);
        $this->subcId = $subcategory->id;
        $this->name = $subcategory->name;
    }

    public function render()
    {
        return view('livewire.admin.edit-subc');
    }
}
