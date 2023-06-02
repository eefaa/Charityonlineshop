<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AddProduct extends Component
{
    use WithFileUploads;

    public $name;
    public $ctg;
    public $shortDesc;
    public $description;
    public $oriPrice;
    public $stockStatus = 'instock';
    public $quantity;
    public $image;
    public $ctgId;

    public function addP()
    {
        $this->validate([
            'name' => 'required',
            'ctg' => 'required', 
            'shortDesc' => 'required', 
            'description' => 'required', 
            'oriPrice' => 'required',
            'stockStatus' => 'required',
            'quantity' => 'required',
            'image' => 'required',
            'ctgId' => 'required',
        ]);
        $product = new Product();
        $product->name = $this->name;
        $product->ctg = $this->ctg;
        $product->shortDesc = $this->shortDesc;
        $product->description = $this->description;
        $product->oriPrice = $this->oriPrice;
        $product->stockStatus = $this->stockStatus;
        $product->quantity = $this->quantity;
        $imgName = Carbon::now()->timestamp.'.'.$this->image->extension();
        $this->image->storeAs('products',$imgName);
        $product->image = $this->imgName;
        $product->ctgId = $this->ctgId;
        $product->save();
        session()->flash('message','Product has been added !');
    }

    public function generatectg()
    {
        $this->ctg = Str::slug($this->name);
    }

    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.admin.add-product',['categories'=>$categories]);
    }
}
