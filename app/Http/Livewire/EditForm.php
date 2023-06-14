<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class EditForm extends Component
{
    public $place,$beds,$price,$description,$location_id,$img,$house,$locations;
    public $images = [];
    public $temporary_images;
    public $image;
 

    use WithFileUploads;

    public function mount(){
        $this->place=$this->house->place;
        $this->beds=$this->house->beds;
        $this->price=$this->house->price;
        $this->description=$this->house->description;
        $this->location_id=$this->house->location_id;

    }


    protected $rules = [
        'place'=> 'required|min:1|max:30',
        'price'=> 'required|numeric',
        'description'=> 'required|min:10|max:1000',
        'beds'=> 'required|numeric',
        'user_id'=> 'required',
        'location_id' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
        // 'img' => 'image'
    ];

    protected $messages = [
        // :attribute per richiamare il nome dell'attributo
        '*.required'=> 'Il campo è obbligatorio',
        'place.max'=> 'Il campo dev\'essere al massimo di 30 caratteri',
        '*.number'=> 'Solo numeri consentiti',
        'description.min'=> 'La descrizione dev\'essere almeno di 10 caratteri',
        'description.max'=> 'Massimo 1000 caratteri',
        'images.image' => 'Deve essere un\'immagine',
        'images.max' => 'L\'immagine deve essere di massimo un 1mb'
        // 'img.image' => 'File immagine richiesto'
    ];


    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:1024',
            ])) {
                foreach ($this->temporary_images as $image){
                    $this->images[] = $image;
                }
        }   
    }   

    public function removeImage($key){   
        if(in_array($key, array_keys($this->images))){
                unset($this->images[$key]);
        }
    }


    // permette di modificare un articolo
    public function houseUpdate(){
        // metodo classico
        $this->house->update([
            'place' => $this->place,
            'beds' => $this->beds,
            'description' => $this->description,
            'price' => $this->price,
            'location_id' => $this->location_id,
            'is_accepted'=> null
            
        ]);
        // if($this->house->img){
        //     $this->house->update([
        //     'img'=>$this->house->file('img')->store('public/media')
        //     ]);
        // }

        if(count($this->images)){
            foreach ($this->images as $image) {
                $this->house->images()->create(['path' => $image->store('images', 'public')]);
            }
        }
        
        return redirect(route('index'))->with('editOk', 'Modifiche applicate! Attendi una revisione');
    }


    public function render()
    {
        return view('livewire.edit-form');
    }
}
