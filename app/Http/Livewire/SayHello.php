<?php

namespace App\Http\Livewire;

use App\Models\User\User;
use Livewire\Component;

class SayHello extends Component
{
    public $user;

    protected $listeners = [
        'refreshChildren' => 'refreshMe'
    ];

    public function refreshMe($someVariable)
    {

    }

    public function mount(User $user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.say-hello');
    }
}
