<?php

namespace App\Http\Livewire;

use App\Models\GuestHouse;
use App\Models\Location;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;


class CreateForm extends Component{
    public $place, $price, $description, $beds, $location_id, $user_id, $guest_houses;
    // public $img;
    // public $genre_id =[];
    // public $color_id=[];
    
    //per caricare i file
    //use WithFileUploads;
    
    protected $rules = [
        'place'=> 'required|min:1|max:30',
        'price'=> 'required|numeric',
        'description'=> 'required|min:10|max:1000',
        'beds'=> 'required|numeric',
        'user_id'=> 'required'

    //     // 'img' => 'required|image|max:2048'
    ];

    protected $messages = [
        '*.required'=> 'Campo richiesto',
        '*.min'=> 'Inserisci almeno un carattere',
        'place.max'=> 'Massimo 30 caratteri',
        '*.number'=> 'Solo numeri consentiti',
        'description.min'=> 'Inserisci almeno 10 caratteri',
        'description.max'=> 'Massimo 1000 caratteri'

    //     // 'img.required' => ' il file deve essere un obbligatorio.',
    //     // 'img.image' => 'il  file deve essere un immagine.'
    ];

    public function store(){

        $this->user_id=Auth::user()->id;
       
        $this->validate();
                
        $guest_houses = Auth::user()->guest_houses()->create([
            "place"=> $this->place,
            "beds"=> $this->beds,
            "price"=> $this->price,
            "description"=> $this->description,
            "location_id"=>$this->location_id
            // "img"=> $this->img->store('public/media'),
        ]);
        $this->reset();
        session()->flash('message','Prodotto caricato correttamente');
    }
        
        public function updated($propertyName){
            $this->validateOnly($propertyName);
        }
            public function render(){
                return view('livewire.create-form', ['locations'=> Location::all()]);
                // return view('livewire.show-form', ['colors'=> Color::all(),'genres'=> Genre::all()]);
            }
        }
        