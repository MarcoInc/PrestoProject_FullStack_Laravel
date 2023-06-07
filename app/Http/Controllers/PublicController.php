<?php

namespace App\Http\Controllers;

use App\Models\GuestHouse;
use Illuminate\Http\Request;

class PublicController extends Controller{

 
    public function home() {
        
        $guest_houses = GuestHouse::orderBy('created_at', 'desc')->take(4)->get();
        //dd($guest_houses);
        return view('home', compact('guest_houses'));
        
      
    }
    
    public function index(){
        $guest_houses = GuestHouse::all();
        return view('product.index', compact('guest_houses'));
    }
    
}
