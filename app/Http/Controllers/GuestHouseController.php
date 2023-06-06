<?php

namespace App\Http\Controllers;

use App\Models\GuestHouse;
use Illuminate\Http\Request;

class GuestHouseController extends Controller
{
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
    public function show(GuestHouse $guestHouse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GuestHouse $guestHouse)
    {
        //
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
    public function destroy(GuestHouse $guestHouse)
    {
        //
    }
}
