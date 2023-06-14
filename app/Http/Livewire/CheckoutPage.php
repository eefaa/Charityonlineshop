<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Cart;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Stripe\StripeClient;


    // require './vendor/autoload.php';
    header('Content-Type', 'application/json');
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
    public $postalCode;
    public $email;
    public $nameId;

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
            'postalCode' => 'required',
            
        ]);
        $combinedAddress = $this->address . ', ' . $this->state . ', ' . $this->postalCode;
        // Update the user's profile
        $user = auth()->user();
        $user = new User();
        $user->name = $this->name;    
        $user->phone = $this->phoneNumber;
        $user->email = $this->email;
        $user->address = $this->combinedAddres;
        $user->save();
    }

    public function render()
    {

       
        return view('livewire.checkout-page');
    }  
}



