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

    public function register() {

        $data = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|same:passwordConfirmation',
        ]);

        $user = User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);

        auth()->login($user);

        return redirect('/');
    }

    public function render()
    {
        return view('livewire.auth.register');
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
