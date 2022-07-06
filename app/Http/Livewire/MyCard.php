<?php

namespace App\Http\Livewire;

use App\Models\CardInformation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Hash;

class MyCard extends Component
{
    public $search = "fdsf";
    protected $listeners = ['deleted' => '$refresh'];

    public function render()
    {
        // if($this->search){
            // dd($this->search);
        // }

        $mycard = CardInformation::where('user_id', '=', Auth::user()->id)
        ->orWhere('name', '%like%', $this->search)
        ->get();
        return view('livewire.my-card', [
            'mycard' => $mycard,
        ]);
    }

    public function delete($id){
        $data = CardInformation::find($id);
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

    public function ShowQr($id)
    {
        $data = CardInformation::findOrFail($id);
        $qrcode = QrCode::format("png")->size(400)->generate("http://127.0.0.1:8000/show-card/" . $data->id);
        return view('livewire.show-qr',compact('qrcode'));
    }

}
