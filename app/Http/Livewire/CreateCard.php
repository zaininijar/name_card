<?php

namespace App\Http\Livewire;

use App\Models\CardInformation;
use App\Models\member_status;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

class CreateCard extends Component
{
    use WithFileUploads;
    public $updateId = "";
    public $user_id;
    public $name;
    public $email;
    public $country;
    public $address;
    public $proffession;
    public $about_me;
    public $profile_photo;
    public $preview_profile_photo;
    public $instagram;
    public $facebook;
    public $twitter;
    public $whatsapp;
    public $linkedin;
    public $tiktok;
    public $youtube;
    public $gallery_photo;
    public $alert_success = 0;
    public $preview = 0;


    protected $listeners = ['cardAdded' => 'messageSuccess', 'cardFailed' => 'messageFailed', 'limit' => 'unExpectedLimit'];

    public function mount($id = null)
    {
        if($id !== null){
            $this->editeCard($id);
        };
    }

    public function messageSuccess()
    {
        $this->formReset();

        $this->alert('success', 'Success', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Hide',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
    }

    public function unExpectedLimit(){
        $this->alert('error', 'Limit Habis', [
            'position' =>  'top-end',
            'timer' =>  3000,
            'toast' =>  true,
            'text' =>  '',
            'confirmButtonText' =>  'Ok',
            'cancelButtonText' =>  'Hide',
            'showCancelButton' =>  true,
            'showConfirmButton' =>  false,
        ]);
    }

    public function formReset()
    {
        $this->updateId = "";
        $this->user_id = "";
        $this->name = "";
        $this->email = "";
        $this->country = "";
        $this->address = "";
        $this->proffession = "";
        $this->about_me = "";
        $this->profile_photo = NULL;
        $this->instagram = "";
        $this->facebook = "";
        $this->twitter = "";
        $this->whatsapp = "";
        $this->linkedin = "";
        $this->tiktok = "";
        $this->youtube = "";
        $this->preview = 0;
        $this->gallery_photo = "";
    }

    public function messageFailed()
    {
        dd('failed');
    }

    public function render()
    {
        return view('livewire.create-card');
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'country' => 'required',
        'address' => 'required',
        'proffession' => 'required',
        'about_me' => 'required',
        // 'profile_photo' => 'required'
    ];

    protected $messages = [
        'name.required' => 'The Name Address cannot be empty.',
        'email.required' => 'The Email Address cannot be empty.',
        'email.required' => 'The Email Address cannot be empty.',
        'country.required' => 'The Country Address cannot be empty.',
        'address.required' => 'The Address Address cannot be empty.',
        'proffession.required' => 'The Proffession Address cannot be empty.',
        'about_me.required' => 'The About me Address cannot be empty.',
        // 'photo_profile.required' => 'The Profile Photo cannot be empty.',
        'email.email' => 'The Email Address format is not valid.',
    ];

    public function saveOrUpdate()
    {
        $this->validate();

        if ($this->updateId == "") {
            $limit = Auth::User()->limit;

            if ($limit >= 1) {
                $limit = $limit - 1;
                $save = User::updateOrCreate(['id' => Auth::User()->id], [
                    'limit' => $limit
                ]);
            }else {
                $this->emit('limit');
                return false;
            }
        }

        if(!is_string($this->profile_photo)){
            $file_name = time().'_'.$this->profile_photo->getClientOriginalName();
            $this->profile_photo->storeAs('public/profile_photos', $file_name);
            $this->profile_photo = $file_name;
        };

        $save = CardInformation::updateOrCreate(['id' => $this->updateId], [
            'user_id' => Auth::User()->id,
            'name' => $this->name,
            'email' => $this->email,
            'country' => $this->country,
            'address' => $this->address,
            'proffession' => $this->proffession,
            'about_me' => $this->about_me,
            'profile_photo' => $this->profile_photo,
            'instagram' => $this->instagram,
            'facebook' => $this->facebook,
            'twitter' => $this->twitter,
            'whatsapp' => $this->whatsapp,
            'linkedin' => $this->linkedin,
            'tiktok' => $this->tiktok,
            'youtube' => $this->youtube,
            'gallery_photo' => $this->gallery_photo,
        ]);

        if($save == true){
            $this->emit('cardAdded');
            redirect('dashboard/my-card');
        }else{
            return $this->emit('cardFailed');
        }

    }

    public function editeCard($id)
    {
        $data = CardInformation::find($id);

        $this->preview = true;

        $this->updateId = $data->id;
        $this->user_id = $data->user_id;
        $this->name = $data->name;
        $this->email = $data->email;
        $this->country = $data->country;
        $this->address = $data->address;
        $this->proffession = $data->proffession;
        $this->about_me = $data->about_me;
        $this->preview_profile_photo = $data->profile_photo;
        $this->profile_photo = $data->profile_photo;
        $this->instagram = $data->instagram;
        $this->facebook = $data->facebook;
        $this->twitter = $data->twitter;
        $this->whatsapp = $data->whatsapp;
        $this->linkedin = $data->linkedin;
        $this->tiktok = $data->tiktok;
        $this->youtube = $data->youtube;

    }
}
