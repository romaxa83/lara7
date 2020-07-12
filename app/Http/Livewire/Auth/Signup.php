<?php

namespace App\Http\Livewire\Auth;

use App\Models\User\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Signup extends Component
{

    public $login = '';
    public $email = '';
    public $password = '';
    public $passwordConfirmation = '';

    public function updated()
    {
        $this->validate(['email' => 'unique:users']);
    }

    public function signup()
    {
        $data = $this->validate([
            'email' => 'required|email|unique:users',
            'login' => 'required',
            'password' => 'required|min:6|same:passwordConfirmation'
        ]);

        $user = User::create([
            'login' => $data['login'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);

        auth()->login($user);

        return redirect(route('admin.home'));
    }

    public function render()
    {
        return view('livewire.auth.signup');

    }
}
