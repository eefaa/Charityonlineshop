<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Redirect;

    
class CheckoutPage extends Component
{
    public $name;
    public $phone;
    public $address;
    public $state;
    public $postcode;
    public $city;
    public $nameId;
    public $product_name;
    public $product_price;
    public $quantity;
    public $subtotal;

    public $n_name;
    public $n_phone;
    public $n_address;
    public $n_address2;
    public $n_state;
    public $n_zipcode;
    public $n_city;

    public function mount()
    {
        // Fetch the current user's data
        $user = auth()->user();
        $userData = User::select('name', 'phone','address')->find($user->id);
        $this->name = $userData->name;
        $this->phone = $userData->phone;
        $this->address = $userData->address;

    }

    // public function updateAddress()
    // {
    //     // Validate the input fields
    //     $this->validate([
    //         'name' => 'required|string',
    //         'phone' => 'required',
    //         'address' => 'required',
    //         'state' => 'required',
    //         'postcode' => 'required',
    //         'city' => 'required',
            
    //     ]);

    //     $combinedAddress = $this->n_address . ', ' . $this->n_city . ', ' . $this->n_state . ',' . $this->n_postcode;
    //     // Update the user's profile
    //     $user = auth()->user();
    //     $user = new User();
    //     $user->name = $this->n_name;    
    //     $user->address = $combinedAddress;
    //     $user->phone = $this->n_phone;
    //     $user->save();
    // }

    public function saveOrder()
    {
        if(Cart::content()->count() == 0) return;

        $user = auth()->user();
        $order= new Order();
        $order->user_id = $user->id;
        $order->subtotal = Cart::subtotal() ?? 0;
        $order->status = 'To Ship';
        $order->tracking_no = '';
        $order->save();

        $stripe_items = [];
        
        foreach(Cart::content() as $item){
            OrderItem::create(
                [
                    "quantity" => $item->qty,
                    "amount" => $item->model->oriPrice,
                    "subtotal" => $item->model->oriPrice * $item->qty,
                    "product_id" => $item->model->id,
                    "order_id" => $order->id
                ]
            );

            $stripe_items[] = [
                "price_data" => [
                    "currency" => "myr",
                    "product_data" => [
                        "name" => $item->model->name,
                        "description" => $item->model->description ?? "",
                    ],
                    "unit_amount" => intval($item->model->oriPrice * 100) ?? 0
                ],
                // "quantity" => $item->qty
                "quantity" => "1"
            ];
        }

        header('Content-Type', 'application/json');
        //private key
        $stripe = new StripeClient("sk_test_51NDTYII77OwsPp92HgyJpxku5KnJMvMdloXOxUkaT8NS1wuD7Btyuc4xZtqjY6oX6jB4Q3MDcQynBeN0oiQL449z00TpkEG3ih");
        $session = $stripe->checkout->sessions->create([
            "success_url" => "http://charityonlineshop-v1.test/paymentberjaya/" . $order->id,
            "cancel_url" => "http://charityonlineshop-v1.test/paymentcancel/",
            "payment_method_types" => ['card'],
            "mode" => 'payment',
            "line_items" => $stripe_items
        ]);

        Redirect::to($session->url);
        // dd($session);




       
    }

    public function render()
    {

        return view('livewire.checkout-page');
    }  
}



