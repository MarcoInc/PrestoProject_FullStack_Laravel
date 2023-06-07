<?php

namespace App\Http\Controllers;

use App\Models\GuestHouse;
use App\Models\Location;
use Illuminate\Http\Request;

class GuestHouseController extends Controller{
    public function __construct(){
        $this->middleware('auth')->except('index');
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
        return view('product.show', compact('house'));
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
        return redirect(route('show'))->with('message', 'prodotto eliminato correttamente');
    }
}
