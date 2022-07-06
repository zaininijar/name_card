<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CardInformation;
use Livewire\WithPagination;

class AllCard extends Component
{
    use WithPagination;

    protected $listeners = ['deleted' => '$refresh'];

    public function render()
    {
        return view('livewire.all-card', [
            'cards' => CardInformation::paginate(10),
        ]);
    }

    public function delete($id){
        $data = CardInformation::find($id);
        $image_path = 'profile_photos/' . $data->profile_photo;

        CardInformation::findOrfail($id)->delete();
        $this->alert('success', 'card '. $data->name . ' <br> has been deleted', [
            'position' =>  'bottom-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Ok',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
        $this->emit('deleted');
    }
}
