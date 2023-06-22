<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;


class EditCtg extends Component
{
    public  $ctgId;
    public $name;
    public $ctg;

    public function updateCtg()
    {
        $this->validate([
            'name' => 'required',
            'ctg' => 'required'
        ]);
        $category = Category::find($this->ctgId);
        $category->name = $this->name;
        $category->ctg = $this->ctg;
        $category->save();
        session()->flash('message','Category has been updated successfully !');
    }
    
    public function update($usrinputs)
    {
        $this->validateOnly($usrinputs,[
           'name'=>'required',
           'ctg'=>'required' 
        ]);
    }
    
    public function generatectg()
    {
        $this->ctg = Str::slug($this->name);
    }
    
    public function mount($ctgId)
    {
        $category = Category::find($ctgId);
        if($category){
            $this->ctgId = $category->id;
            $this->name = $category->name;
            $this->ctg = $category->ctg; 
    }
        }
       

    public function render()
    {
        return view('livewire.admin.edit-ctg');
    }
}
