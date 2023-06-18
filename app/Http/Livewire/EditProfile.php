<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    public $profile, $user_id, $name, $age, $language, $work, $contact, $from, $info;
    public $img;

    use WithFileUploads;

    protected $rules = [
        'user_id' => 'required'
    ];

    public function mount(){
        $this->user_id = Profile::find($this->user_id);
        $this->name = $this->name;
        $this->age = $this->age;
        $this->language = $this->language;
        $this->work = $this->work;
        $this->contact = $this->contact;
        $this->from = $this->from;
        $this->img = $this->img;
        $this->info = $this->info;
    }
    // public function mount(){
    //     $this->user_id = Profile::find($this->user_id);
    //     $this->profile = Profile::find($this->user_id);
    //     if (isset($this->profile->name)) 
    //         $this->name = $this->profile->name;
    //     if (isset($this->profile->age)) 
    //         $this->age = $this->profile->age;
    //     if (isset($this->profile->language)) 
    //         $this->language = $this->profile->language;
    //     if (isset($this->profile->work)) 
    //         $this->work = $this->profile->work;
    //     if (isset($this->profile->contact)) 
    //         $this->contact = $this->profile->contact;
    //     if (isset($this->profile->from)) 
    //         $this->from = $this->profile->from;
    //     if (isset($this->profile->img)) 
    //         $this->img = $this->profile->img;
    //     if (isset($this->profile->info)) 
    //         $this->info = $this->profile->info;
    // }


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
        
        return redirect(route('userProfile', ['id' => $this->user_id]))->with('editProfileOk', 'Modifiche applicate!');
    }


    public function render()
    {
        return view('livewire.edit-profile');
    }
}
