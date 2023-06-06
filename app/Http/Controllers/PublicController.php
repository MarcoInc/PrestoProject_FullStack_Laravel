<?php

namespace App\Http\Controllers;

use App\Models\GuestHouse;
use Illuminate\Http\Request;

class PublicController extends Controller{
       
    public function home() {

        $guest_houses = GuestHouse::take(6)->get()->sortByDesc('created_at');
        //dd($guest_houses);
        return view('home', compact('guest_houses'));
    }
    
}
