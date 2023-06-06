<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class CreateForm extends Component{
    public $place, $price, $description, $beds;
    // public $img;
    // public $genre_id =[];
    // public $color_id=[];
    
    //per caricare i file
    //use WithFileUploads;
    
    protected $rules = [
        'place'=> 'required|min:1|max:30',
        'price'=> 'required|number',
        'description'=> 'required|min:10|max:1000',
        'beds'=> 'required|number'

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
        // $this->validate();
                
        $guest_houses = Auth::user()->guest_houses()->create([
            "place"=> $this-> place,
            "beds"=> $this-> beds,
            "price"=> $this-> price,
            "description"=> $this-> description,

            // "img"=> $this->img->store('public/media'),
        ]);

        // $shoe->genres()->attach($this->genre_id);
        // $shoe->colors()->attach($this->color_id);
        $this->reset();
        session()->flash('message','Scarpa caricata correttamente');
    }
        
        // public function updated($propertyName){
            //     $this->validateOnly($propertyName);
            // }
            public function render(){
                return view('livewire.create-form');
                // return view('livewire.show-form', ['colors'=> Color::all(),'genres'=> Genre::all()]);
            }
        }
        