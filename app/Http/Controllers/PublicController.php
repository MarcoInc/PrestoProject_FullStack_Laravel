<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use App\Models\GuestHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller{
    public function home() {
        $guest_houses = GuestHouse::where('is_accepted',true) 
                                    ->orderBy('created_at', 'desc')->take(5)->get();
        return view('home', compact('guest_houses'));      
    }
    public function terms() {
        return view('terms.terms');
    }
    public function privacy() {
        return view('terms.privacy');
    }
    public function services() {
        return view('terms.services');
    }
    
    public function index(){
        $guest_houses = GuestHouse::where('is_accepted', true) //solo quelli is_accepted=true
            ->orderBy('created_at', 'desc') //ordine decrescente per data di creazione
            ->paginate(6);//La funzione paginate mi permette di mostrare nella pagina solo un tot di articoli
        
        $locations = Location::all();
        $icons = ['fa-water', 'fa-mountain','fa-fish-fins', 'fa-tree-city', 'fa-snowflake','fa-sun-plant-wilt', 'fa-horse-head'];
        return view('product.index', compact('guest_houses', 'locations', 'icons'));
    }

    public function categoryShow(Location $location){
        $icons = ['fa-water', 'fa-mountain','fa-fish-fins', 'fa-tree-city', 'fa-snowflake','fa-sun-plant-wilt', 'fa-horse-head'];

        return view('product.category-show', compact('location', 'icons'));
    }
    
    public function searchHouse (Request $request){
        $guest_houses = GuestHouse::search($request->searched)->where('is_accepted', true)->paginate(6);
        $locations = Location::all();
        return view('product.index', compact('guest_houses','locations'));
    }

    public function contactUs(){

        return view('mail.contact-us');
    }

    public function profilo(){
        //crea un array delle sole Song in cui user_id è uguale all'id dell'Utente e le ordina in base al titolo ascendente
        $houses=GuestHouse::where('user_id',Auth::id())->orderBy('updated_at','desc')->get();
        return view('profilo',compact('houses'));
    }

    public function userProfile($id){
        $houses=GuestHouse::where('user_id',$id)->where('is_accepted',true)->orderBy('updated_at','desc')->get();
        $name = User::findOrFail($id)->name;
        return view('user',compact('houses','name'));
    }

    public function setLanguage($lang){
        session()->put('locale',$lang);
        

        return redirect()->back();
    }
}
