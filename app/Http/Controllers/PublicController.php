<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller{
        //TODO altre funzioni middleware
    
    public function home() {
        return view('home');
    }
    
}
