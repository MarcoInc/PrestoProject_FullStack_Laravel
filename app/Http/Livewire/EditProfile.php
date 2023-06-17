<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProfile extends Component
{
    public $profile, $user_id, $name, $age, $language, $work, $contact, $from, $info;
    // public $img;

    use WithFileUploads;

    protected $rules = [
        'user_id' => 'required'
    ];

    public function mount()
    {
        $this->name = $this->name;
        $this->age = $this->age;
        $this->language = $this->language;
        $this->work = $this->work;
        $this->contact = $this->contact;
        $this->from = $this->from;
        // $this->img=$this->img;
        $this->info = $this->info;
    }


    public function profileUpdate()
    {
       
        $this->user_id=Auth::user()->id;
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
            // 'img' => $this->img,
            'info' => $this->info
        ]);

        

        // if($this->profile->img){
        //     $this->profile->update([
        //     'img'=>$this->profile->file('img')->store('public/media')
        //     ]);
        // }

        // if(count($this->images)){
        //     foreach ($this->images as $image) {
        //         $this->house->images()->create(['path' => $image->store('images', 'public')]);
        //     }
        // }

        return redirect(route('profilo'))->with('editProfileOk', 'Modifiche applicate!');
    }


    public function render()
    {
        return view('livewire.edit-profile');
    }
}
