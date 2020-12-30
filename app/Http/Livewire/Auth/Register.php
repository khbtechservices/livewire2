<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;

use App\User;

use Illuminate\Support\Facades\Hash;

class Register extends Component
{

    public $name = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|same:passwordConfirmation',
    ];

    public function register() {

        $this->validate();

        $user = User::create([

            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),

        ]);

        auth()->login($user);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.auth');
    }

    public function updatedEmail() {
        $this->validate([
            'email' => 'email|unique:users'
        ]);
    }

    public function updatedPassword() {
        $this->validate([
            'password' => 'min:8'
        ]);
    }
}
