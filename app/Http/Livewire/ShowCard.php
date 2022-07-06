<?php

namespace App\Http\Livewire;

use App\Models\CardInformation;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class ShowCard extends Component
{

    public $data;

    public function mount($id)
    {
        $this->data = CardInformation::find($id);
    }

    public function render()
    {
        return view('livewire.show-card', ['data' => $this->data])->layout('layouts.guest');
    }
}
