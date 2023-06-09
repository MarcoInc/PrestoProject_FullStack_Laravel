<?php

namespace App\Http\Controllers;

use App\Models\GuestHouse;
use Illuminate\Http\Request;

class RevisorController extends Controller{
    public function revisorIndex(){
        // restituiscimi il primo is_accepted=null
        $house_toCheck=GuestHouse::where('is_accepted',null)->first();
        return view('revisor.index', compact('house_toCheck'));
    }

    public function acceptAnnuncio(GuestHouse $house){
        $house->setAccepted(true);
        return redirect()->back()->with('message','Articolo approvato');
    }
    public function rejectAnnuncio(GuestHouse $house){
        $house->setAccepted(false);
        return redirect()->back()->with('message','Articolo non approvato');
    }
    
    
}
