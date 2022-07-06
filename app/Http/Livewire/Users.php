<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Users extends Component
{
    public $users;

    public function render()
    {
        $this->users = User::all();
        return view('livewire.users');
    }
}
