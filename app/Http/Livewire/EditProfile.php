<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component{
//user preso dalla vista
//profile scritto dopo
    public $profile, $user, $user_id, $name, $age, $language, $work, $contact, $from, $info, $profile_tmp;
    public $img;

    use WithFileUploads;

    protected $rules = [
        'user_id' => 'required'
    ];

    public function mount(){
        $this->profile_tmp = Profile::find($this->user->id);
        if($this->profile_tmp){
            $this->name = $this->profile_tmp->name;
            $this->age = $this->profile_tmp->age;
            $this->language = $this->profile_tmp->language;
            $this->work = $this->profile_tmp->work;
            $this->contact = $this->profile_tmp->contact;
            $this->from = $this->profile_tmp->from;
            $this->img = $this->profile_tmp->img;
            $this->info = $this->profile_tmp->info;
        }
    }
    

    public function profileUpdate()
    {

        $this->user_id = Auth::user()->id;
        $this->profile = Profile::updateOrCreate(
            ['user_id' => $this->user_id],
            [
                'user_id' => $this->user_id,
                'name' => $this->name,
                'age' => $this->age,
                'language' => $this->language,
                'work' => $this->work,
                'contact' => $this->contact,
                'from' => $this->from,
                'img' => optional($this->img)->store('public/media'),
                'info' => $this->info
            ]
        );

        // if ($this->img) {
        //     $this->profile->img = $this->img->store('public/media');
        // }
        
        return redirect(route('userProfile', ['id' => $this->user_id]))->with('editProfileOk', __('messages.editProfileOk'));
    }


    public function render()
    {
        return view('livewire.edit-profile');
    }
}
