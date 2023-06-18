<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class MailForm extends Component{
    public $body, $user, $email;


    protected $rules = [
        'user' => 'required|min:5|max:30',
        'email' => 'required|email',
        'body' => 'required|min:10|max:300'
    ];

    // protected $messages = [
    //     // :attribute per richiamare il nome dell'attributo
    //     '*.required' => 'Il campo è obbligatorio',

    //     'user.min' => 'Inserisci almeno un carattere',
    //     'user.max' => 'Massimo 30 caratteri',

    //     'email.email' => 'Devi inserire un \'email valida',

    //     'body.min' => 'Il messaggio deve avere almeno di 10 caratteri',
    //     'body.max' => 'Massimo 1000 caratteri',
    // ];
    public function send(){
        $this->validate();

        $user=$this->user;
        $email=$this->email;
        $body=$this->body;
        $finalEmail=new ContactMail($user,$email,$body);

        Mail::to($email)->send($finalEmail);
        $this->reset();

        return redirect('contattaci')->with("sendEmail", __('messages.sendMailOk'));
    
    }

   
    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
    public function render(){
        return view('livewire.mail-form');
        // return view('livewire.show-form', ['colors'=> Color::all(),'genres'=> Genre::all()]);
    }
}
