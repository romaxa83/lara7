<?php

namespace App\Http\Livewire;

use App\Models\User\User;
use Livewire\Component;

class TestForm extends Component
{
    public $name = 'Romaxa';
    public $names = ['Root', 'Rembo', 'Rocky'];
    public $check = false;
    public $greeting = 'Hello';
    public $tech = ['PHP'];

    public $users;

    public function mount()
    {
        $this->users = User::query()->get();
    }

    public function resetName($name = 'Chiccko')
    {
        $this->name = $name;
    }

    public function removeUser($email)
    {
        User::query()
            ->where('email', $email)
            ->first()->delete();

        $this->users = User::query()->get();
    }

    public function refreshChildren()
    {
        $this->emit('refreshChildren', 'foo');
    }

    public function updated()
    {
        $this->name = strtoupper($this->name);
    }

    public function render()
    {
        return view('livewire.test-form');
    }
}
