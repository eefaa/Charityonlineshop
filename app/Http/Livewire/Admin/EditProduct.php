<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class EditProduct extends Component
{
    use WithFileUploads;
    public $productId;
    public $name;
    
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
        $this->shortDesc= $product->shortDesc;
        $this->description = $product->description;
        $this->oriPrice= $product->oriPrice;
        $this->stockStatus = $product->stockStatus;
        $this->quantity= $product->quantity;
        $this->image= $product->image;
        $this->ctgId= $product->ctgId;
    }
    
    public function editP()
    {
        $this->validate([
            'name' => 'required',
            'shortDesc' => 'required',
            'description' => 'required',
            'oriPrice' => 'required',
            'stockStatus' => 'required',
            'quantity' => 'required',
            'ctgId' => 'required',
        ]);
    
        $product = Product::find($this->productId);
        $product->name = $this->name;
        $product->shortDesc = $this->shortDesc;
        $product->description = $this->description;
        $product->oriPrice = $this->oriPrice;
        $product->stockStatus = $this->stockStatus;
        $product->quantity = $this->quantity;
        // Clear the old image value
    
        if ($this->newimg) {
            Storage::delete('assets/imgs/products/' . $product->img);

            // Generate a unique file name for the new image
            $imgName = "product-" . $product->id . "-1." . $this->newimg->getClientOriginalExtension();
    
            // Store the new image
            $this->newimg->storeAs('shop', $imgName);
    
            // Update the product's image property
            // $product->img = $imgName;
        }
    
        $product->ctgId = $this->ctgId;
        $product->save();
        session()->flash('message', 'Product has been updated!');
    }
    

    public function render()
    {
        $categories = Category::orderBy('name','ASC')->get();
        return view('livewire.admin.edit-product',['categories'=>$categories]);
    }
}
