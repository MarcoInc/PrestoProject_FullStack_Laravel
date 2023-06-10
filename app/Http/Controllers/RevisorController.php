<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\GuestHouse;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller{

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect()->back()->with('messageBecomeRevisor','Candidatura inviata corettamente');

    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor',["email"=>$user->email , "value"=>1]);
        return redirect('/')->with('messageRevisorOK','Utente '.$user->name.' è stato reso revisore!');
    }

    public function revisorIndex(){
        // restituiscimi il primo is_accepted=null
        $house_toCheck=GuestHouse::where('is_accepted',null)->orderBy('created_at', 'asc')->get();
        return view('revisor.index', compact('house_toCheck'));
    }

    public function acceptAnnuncio(GuestHouse $house_toCheck){
        $house_toCheck->setAccepted(true);
        return redirect()->back()->with('message','Articolo approvato');
    }
    public function rejectAnnuncio(GuestHouse $house_toCheck){
        $house_toCheck->setAccepted(false);
        return redirect()->back()->with('message','Articolo non approvato');
    }
    
    
}
