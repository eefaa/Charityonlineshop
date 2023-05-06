<?php

namespace App\Http\Livewire;

use App\Models\Product;
// use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Livewire\Component;
// use Cart;
use Gloudemans\ShoppingCart\Facades\Cart;

class ProductPage extends Component
{
    // use WithPagination;
    public $pageSize = 12;
    public $minValue = 0;
    public $maxValue = 100;

    public function store($product_id,$product_name,$product_price)
    {
        // Cart::add($product_id,$product_name,1,$product_price)->associate('\App\Models\Product');
        Cart::add($product_id,$product_name,1,$product_price);
        session()->flash('success_message','Item added in Cart');
        return redirect()->route('product.cart');
    }
//     public function store($product_id, $product_name, $product_price)
//     {
//         // Retrieve the cart information from the session
//         $cart = session()->get('product.cart');
        
//         // Check if the product is already in the cart
//         if (isset($cart[$product_id])) 
//         {
//             // If it is, update the quantity
//             $cart[$product_id]['quantity']++;
//         }
//         else 
//         {
//             // If it's not, add it to the cart with a quantity of 1
//             $cart[$product_id] = [
//                 'name' => $product_name,
//                 'price' => $product_price,
//                 'quantity' => 1
//             ];
//     }
    
//     // Store the updated cart information in the session
//     session()->put('product.cart', $cart);
    
//     // Redirect the user back to the product page or cart page
//     return redirect()->back()->with('success_message', 'Product added to cart!');
// }

    public function changePageSize($size)
    {
        $this->pageSize = $size;
    }
    public function render()
    {
        $products = Product ::paginate(12);
        return view('livewire.product-page',['products'=>$products]);
        // return view('livewire.product-page');
    }
}
