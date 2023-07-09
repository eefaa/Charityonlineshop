<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Donate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe\StripeClient;
use Illuminate\Support\Facades\Redirect;

class DonatePage extends Component
{
    public $amount;
    public $name;
    public $phone;
    public $email;
    public $userData;
    

    public function mount()
    {
        // Check if the user is authenticated
        if (auth()->check()) {
            // Fetch the current user's data
            $user = auth()->user();
            $userData = User::select('name', 'email')->find($user->id);
            $this->name = $userData->name;
            $this->email = $userData->email;
        }
    }
    
    public function storeDonate(Request $request)
    {

        $request->validate([
            'amount' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required' 
        ]);

        $donate=Donate::create([
            'amount' => $request->amount,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email, 
        ]);

        // $this->reset();
        session()->flash('message','Donate has been save successfully !');
 
        $stripe_items[] = [
            "price_data" => [
                "currency" => "myr",
                "product_data" => [
                    "name" => $request->name,
                    "description" =>"Donate",
                ],
                "unit_amount" => (int) ($request->amount * 100),
            ],
            "quantity" => 1,
        ];
        

    header('Content-Type', 'application/json');
    //private key
    $stripe = new StripeClient("sk_test_51NDTYII77OwsPp92HgyJpxku5KnJMvMdloXOxUkaT8NS1wuD7Btyuc4xZtqjY6oX6jB4Q3MDcQynBeN0oiQL449z00TpkEG3ih");
    $session = $stripe->checkout->sessions->create([
        "success_url" => "http://charityonlineshop-v1.test/berjayadonate/" ,
        "cancel_url" => "http://charityonlineshop-v1.test/canceldonate/", 
        "payment_method_types" => ['card'],
        "mode" => 'payment',
        "line_items" => $stripe_items
    ]);

    // Redirect::to($session->url);
    return redirect()->to($session->url);
    }

    public function render()
    {
        return view('livewire.donate-page');
    }
}
