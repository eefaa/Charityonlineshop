<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination; 
use Livewire\Component;
use Cart;

class Kategori extends Component
{
        use WithPagination;
        public $itmSize = 12;  
        public $minValue = 0;
        public $maxValue = 100;
        public $orderBy = "Default Sorting";
        public $ctg;

        public function store($product_id,$product_name,$product_price)
        {
            Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
            session()-> flash('Success message','Item added in Cart');
            return redirect()->route('product.cart');
        }

        public function mount ($ctg)
        {
            $this->ctg = $ctg;
        }
    
        public function changeSort($itm)
        {
            $this->orderBy = $itm;
        } 
    
        public function changeItmSize($size)
        {
            $this->itmSize = $size;
        }
    
        public function cat ()
        {
            $categories = Product::where('ctgId',$this->ctgId)->first();
            $id = $categories->id;
    
         
        }
        public function render()
        {
            $categories = Category::where('ctg',$this->ctg)->first();
            $ctgId = $categories->id;
            $ctgName = $categories->name;

            if($this->orderBy == 'Price: Low to High')
            {
                $products = Product::where('ctgId', $ctgId)->orderBy('oriPrice','ASC')->paginate($this->itmSize);
            }
            else if($this->orderBy == 'Price: High to Low') 
            {
                $products = Product::where('ctgId',$ctgId)->orderBy('oriPrice','DESC')->paginate($this->itmSize);
            }
            else if($this->orderBy == 'Latest Item')
            {
                $products = Product::where('ctgId',$ctgId)->orderBy('created_at','DESC')->paginate($this->itmSize);
            }
            else
            {
                $products = Product ::where('ctgId',$ctgId)->paginate($this->itmSize);
            }
            
            $categories = Category::orderBy('name','ASC')->get();
            return view('livewire.kategori',['products'=>$products, 'categories'=>$categories, 'ctgName'=>$ctgName]);
        }
    

    
}
