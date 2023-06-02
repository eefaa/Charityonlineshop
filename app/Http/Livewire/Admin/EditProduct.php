<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class EditProduct extends Component
{
    use WithFileUploads;
    public $productId;
    public $name;
    public $ctg;
    public $shortDesc;
    public $description;
    public $oriPrice;
    public $stockStatus = 'instock';
    public $quantity;
    public $image;
    public $ctgId;
    public $newimg;

    public function mount($productId)
    {
        $product = Product::find($productId);
        $this->productId = $product->id;
        $this->name = $product->name;
        $this->ctg = $product->ctg;
        $this->shortDesc= $product->shortDesc;
        $this->description = $product->description;
        $this->oriPrice= $product->ctg;
        $this->stockStatus = $product->oriPrice;
        $this->quantity= $product->quantity;
        $this->image= $product->image;
        $this->ctgId= $product->ctgId;
    }
    
    public function editP()
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

        $product =Product::find($this->productId);
        $product->name = $this->name;
        $product->ctg = $this->ctg;
        $product->shortDesc = $this->shortDesc;
        $product->description = $this->description;
        $product->oriPrice = $this->oriPrice;
        $product->stockStatus = $this->stockStatus;
        $product->quantity = $this->quantity;
        if($this->newimg)
        {
            unlink('assets/imgs/products/'.$product->image);
            $imgName = Carbon::now()->timestamp.'.'.$this->newimg->extension();
            $this->image->storeAs('products',$imgName);
            $product->image = $this->imgName; 
        }

        $product->ctgId = $this->ctgId;
        $product->save();
        session()->flash('message','Product has been updated !');
    }

    public function generatectg()
    {
        $this->ctg = Str::slug($this->name);
    }

    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.admin.edit-product',['categories'=>$categories]);
    }
}
