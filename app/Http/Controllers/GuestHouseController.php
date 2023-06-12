<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\GuestHouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestHouseController extends Controller{
    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }

    public function create() {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){
        
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id){
        $house = GuestHouse::findOrFail($id);
        //utente proprietario vede i propri non accettati
        if(Auth::user() && Auth::user()->name==$house->user->name && $house->is_accepted==null){
            $locations=Location::all();
            $icons = ['fa-water', 'fa-mountain','fa-fish-fins', 'fa-tree-city', 'fa-snowflake','fa-sun-plant-wilt', 'fa-horse-head'];
            return view('product.show', compact('house', 'locations', 'icons'));
        }
        //revisore vede tutto
        else if(Auth::user() && Auth::user()->is_revisor==1){
            $locations=Location::all();
            $icons = ['fa-water', 'fa-mountain','fa-fish-fins', 'fa-tree-city', 'fa-snowflake','fa-sun-plant-wilt', 'fa-horse-head'];
            return view('product.show', compact('house', 'locations', 'icons'));
        }
        //tutti possono vedere gli accettati
        else if($house->is_accepted==1){
            $locations=Location::all();
            $icons = ['fa-water', 'fa-mountain','fa-fish-fins', 'fa-tree-city', 'fa-snowflake','fa-sun-plant-wilt', 'fa-horse-head'];
            return view('product.show', compact('house', 'locations', 'icons'));
        }
        //se accedo ad un non accettato e non sono ne il proprietario ne un revisore
        else{
            $guest_houses = GuestHouse::where('is_accepted',true) 
            ->orderBy('created_at', 'desc')->take(5)->get();
            //dd($guest_houses);
            return redirect(route('home'))->with('messageNotFound', 'Articolo non trovato')->with(compact('guest_houses'));
        }

    }

    public function edit(GuestHouse $house){
        $locations = Location::all();
        return view('product.edit', compact('house','locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuestHouse $guestHouse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuestHouse $house)
    {
        $house->delete();
        return redirect(route('index'))->with('message', 'prodotto eliminato correttamente');
    }



    
}
