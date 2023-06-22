<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class UserProfile extends Component
{
    public $name;
    public $phone;
    public $address;
    public $email;
    public $nameId;

    public function mount()
    {
        // Fetch the current user's data
        $user = auth()->user();
        $userData = User::select('name', 'email','phone','address')->find($user->id);
        $this->name = $userData->name;
        $this->email = $userData->email;
        $this->phone = $userData->phone;
        $this->address = $userData->address; 
       

    }

    public function updateProfile()
    {
        // Validate the input fields
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required',
            'address' => 'required',
            
        ]);

        // Update the user's profile
        $user = auth()->user();
        // $user = new User();
        $user->name = $this->name;    
        $user->email = $this->email;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->save();
        
        // Auth::guard('web')->refresh();

        session()->flash('message', 'Profile updated successfully!');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}
