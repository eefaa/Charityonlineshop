<?php

namespace App\Http\Livewire;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithPagination; 
use Livewire\Component;

class WomenPage extends Component
{
        use WithPagination;
        public $itmSize = 12;  
        public $minValue = 0;
        public $maxValue = 100;
        public $orderBy = "Default Sorting";
        public $ctg;
    
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

        public function render()
        {
            $categories = Category::where('ctg',$this->ctg)->first();
            $ctgId = $categories->id;
            $ctgName = $categories->name;
            if($this->orderBy == 'Price: Low to High')
            {
                $products = Product::where('ctgId', $ctgId)->orderBy('oriPrice','ASC');
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
            return view('livewire.womenPage',['products'=>$products, 'categories'=>$categories, 'ctgName'=>$ctgName]);
        }
    

    
}
