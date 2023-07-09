<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed','string', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d).+$/'],
            [
                'password.confirmed' => 'The password confirmation does not match.',
                'password.regex' => 'The password must contain a mix of letters and numbers.',
                'password.min' => 'The password must be at least 8 characters.',
            ]
           
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        session()->flash('message', 'Profile updated successfully!');
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
       
    }
}
