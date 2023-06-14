<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Donate;
use Illuminate\Support\Facades\Auth;

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
    

    public function storeDonate()
    {
        $this->validate([
            'amount' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required' 
        ]);

        $donate = new Donate();
        $donate->amount = $this->amount;
        $donate->name = $this->name;
        $donate->phone = $this->phone;
        $donate->email = $this->email;
        $donate->save();
        
        session()->flash('message','Donate has been save successfully !');
        
    }

    public function render()
    {
        return view('livewire.donate-page');
    }
}
