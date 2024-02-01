<?php

namespace App\Livewire;

use Livewire\Component;

use Illuminate\Support\Facades\Auth;

class FilamentLogin extends Component
{
    public $phone;
    public $password;

    public function render()
    {
        return view('livewire.filament-login');
    }

    public function login()
    {
        $this->validate([
            'phone' => 'required|numeric',
            'password' => 'required',
        ]);

        $credentials = [
            'phone' => $this->phone,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->intended('/admin');
        } else {
            // Authentication failed
            session()->flash('error', 'Invalid phone number or password');
            return redirect()->back();
        }
    }
}
