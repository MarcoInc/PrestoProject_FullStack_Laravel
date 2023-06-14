<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use App\Models\GuestHouse;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;


class CreateForm extends Component
{
    public $place, $price, $description, $beds, $location_id, $user_id, $guest_houses, $img;
    public $images = [];
    public $temporary_images;
    public $image;
    // public $genre_id =[];
    // public $color_id=[];
    
    //per caricare i file
    use WithFileUploads;
    
    protected $rules = [
        'place' => 'required|min:1|max:30',
        'price' => 'required|numeric',
        'description' => 'required|min:10|max:1000',
        'beds' => 'required|numeric',
        'user_id' => 'required',
        'location_id' => 'required',
        'images.*' => 'image|max:1024',
        'temporary_images.*' => 'image|max:1024'
        // 'img' => 'required|image'
    ];
    
    protected $messages = [
        // :attribute per richiamare il nome dell'attributo
        '*.required' => 'Il campo è obbligatorio',
        'place.max' => 'Il campo dev\'essere al massimo di 30 caratteri',
        '*.number' => 'Solo numeri consentiti',
        'description.min' => 'La descrizione dev\'essere almeno di 10 caratteri',
        'description.max' => 'Massimo 1000 caratteri',
        'images.image' => 'Deve essere un\'immagine',
        'images.max' => 'L\'immagine deve essere di massimo un 1mb'
        // 'img.required' => 'Caricare file',
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
    }   
        
    public function removeImage($key)
    {   
        if(in_array($key, array_keys($this->images))){
                unset($this->images[$key]);
            }
    }
        
        
        
    public function store(){
        $this->user_id=Auth::user()->id;
        $this->validate();
            
        $this->guest_house = Location::find($this->location)->guest_houses()->create($this->validate());
            
            if(count($this->images)){
                foreach ($this->images as $image) {
                    $this->guest_house->images()->create(['path' => $image->store('images', 'public')]);
                }
            }
            
        $this->guest_house->user()->associate(Auth::user());
            
        $this->guest_house->save();
            
        session()->flash('message', 'Prodotto caricato correttamente');
            
        $this->reset(); 
    }
        
        
        
    public function updated($propertyName){
            $this->validateOnly($propertyName);
    }
    public function render(){
            return view('livewire.create-form', ['locations'=> Location::all()]);
            // return view('livewire.show-form', ['colors'=> Color::all(),'genres'=> Genre::all()]);
    }
        
}        
    