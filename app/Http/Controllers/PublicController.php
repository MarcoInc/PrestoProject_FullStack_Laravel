<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller{

    public function __costructor(){
        //TODO altre funzioni middleware
        $this->middleware('auth')->except('home');
    }
    

    
    public function home() {
        return view('home');
    }
    
}
