<?php

namespace App\Http\Controllers;

use App\Models\GuestHouse;
use App\Models\Location;
use Illuminate\Http\Request;

class GuestHouseController extends Controller{
    public function __construct(){
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){

        $guest_houses=GuestHouse::all();
        return view('index',compact('guest_houses'));
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show($id)
    {

        $house = GuestHouse::findOrFail($id);
        $locations=Location::all();
        $icons = ['fa-water', 'fa-mountain','fa-fish-fins', 'fa-tree-city', 'fa-snowflake','fa-sun-plant-wilt', 'fa-horse-head'];
        return view('product.show', compact('house', 'locations', 'icons'));
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
