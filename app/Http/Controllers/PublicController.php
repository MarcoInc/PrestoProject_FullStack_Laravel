<?php

namespace App\Http\Controllers;

use App\Models\GuestHouse;
use App\Models\Location;
use Illuminate\Http\Request;

class PublicController extends Controller{

 
    public function home() {
        
        $guest_houses = GuestHouse::orderBy('created_at', 'desc')->take(4)->get();
        //dd($guest_houses);
        return view('home', compact('guest_houses'));
        
      
    }
    
    public function index(){
        $guest_houses = GuestHouse::paginate(4); //La funzione paginate mi permette di mostrare nella pagina solo un tot di articoli
        $locations = Location::all();
        $icons = ['fa-water', 'fa-mountain','fa-fish-fins', 'fa-tree-city', 'fa-snowflake','fa-sun-plant-wilt', 'fa-horse-head'];
        return view('product.index', compact('guest_houses', 'locations', 'icons'));
    }

    public function categoryShow(Location $location){
        return view('product.category-show', compact('location'));
    }
    
}
