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
        //Impediamo al revisore di poter mandare la candidatura per diventare revisore
        if(Auth::user()->is_revisor){
            $guest_houses = GuestHouse::where('is_accepted',true) 
            ->orderBy('created_at', 'desc')->take(5)->get();
            //dd($guest_houses);
            return redirect(route('home'), compact('guest_houses'))->with('messageRevisor', __('messages.yetARevisor'));
        }
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect(route('home'))->with('messageBecomeRevisor', __('messages.correctApplication'));
        
    }
    
    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor',["email"=>$user->email , "value"=>1]);
        return redirect('/')->with('messageRevisorOK', __('messages.youAreNowARevisor'));
    }
    
    public function revisorIndex(){
        // restituiscimi il primo is_accepted=null
        $house_toCheck=GuestHouse::where('is_accepted',null)->orderBy('created_at', 'asc')->get();

        // $house_toCheck->push($this->findLast());

        return view('revisor.index', compact('house_toCheck'));
    }

    public function history(){
        $houses = GuestHouse::where('is_accepted', '!=', null)->orderBy('updated_at', 'desc')->get();
        return view('revisor.history', compact('houses'));
    }
    
    public function acceptAnnuncio(GuestHouse $house_toCheck){
        $house_toCheck->setAccepted(true);
        return redirect()->back()->with('messageApproved',__('messages.articleApproved'));
    }
    public function rejectAnnuncio(GuestHouse $house_toCheck){
        $house_toCheck->setAccepted(false);
        return redirect()->back()->with('messageNotApproved',__('messages.articleNotApproved'));
    }

    public function resetRevision(GuestHouse $house){
        $house->is_accepted=null;
        $house->save();

        return redirect()->back()->with('message', __('messages.goToReview'));
    }
    
    // public function findLast(){
    //     $house = GuestHouse::where('is_accepted', '!==', null)->orderBy('updated_at', 'desc')->first();
    //     return $house;
    // }
    
}
