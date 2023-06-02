<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Donate;

class DonatePage extends Component
{
    public $amount;
    public $name;
    public $phone;
    public $email;

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
        session()->flash('message','New category has been created !');
    }
    public function render()
    {
        return view('livewire.donate-page');
    }
}
