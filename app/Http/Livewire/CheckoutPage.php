<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;


    // require './vendor/autoload.php';
    header('Content-Type', 'application/json');
        //private key
        $stripe = new StripeClient("sk_test_51NDTYII77OwsPp92HgyJpxku5KnJMvMdloXOxUkaT8NS1wuD7Btyuc4xZtqjY6oX6jB4Q3MDcQynBeN0oiQL449z00TpkEG3ih");
        $session = $stripe->checkout->sessions->create([
            "success_url" => "http://127.0.0.1:8000/success.html",
            "cancel_url" => "http://127.0.0.1:8000/cancel.html",
            "payment_method_types" => ['card'],
            "mode" => 'payment',
            "line_items" => [
                [
                "price_data" =>[
                    "currency" =>"myr",
                    "product_data" =>[
                        "name"=> "Mobile",
                        "description" => "Latest mobile 2021"
                    ],
                    "unit_amount" => 5000
                ],
                "quantity" => 1 
                ],

                [
                    "price_data" =>[
                        "currency" =>"myr",
                        "product_data" =>[
                            "name"=> "Shirt",
                            "description" => "Light summer shirt"
                        ],
                        "unit_amount" => 2000
                    ],
                    "quantity" => 2 
                ]
            ]
        ]);echo json_encode($session);
    
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

    public function mount()
    {
        // Fetch the current user's data
        $user = auth()->user();
        $userData = User::select('name', 'phone','address')->find($user->id);
        $this->name = $userData->name;
        $this->phone = $userData->phone;
        $this->address = $userData->address;

    }

    public function updateAddress()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required|string',
            'phone' => 'required',
            'address' => 'required',
            'state' => 'required',
            'postcode' => 'required',
            'city' => 'required',
            
        ]);

        $combinedAddress = $this->address . ', ' . $this->city . ', ' . $this->state . ',' . $this->postcode;
        // Update the user's profile
        $user = auth()->user();
        $user = new User();
        $user->name = $this->name;    
        $user->address = $this->combinedAddres;
        $user->phone = $this->phoneNumber;
        $user->save();
    }

    public function saveOrder()
    {
        $order = auth()->user();
        $order= new Order();
        $order->product_name = $this -> product_name;
        $order->product_price=$this -> product_price;
        $order->quantity = $this -> quantity;
        $order->subtotal = $this-> subtotal;
       
    }

    public function render()
    {

        return view('livewire.checkout-page');
    }  
}



