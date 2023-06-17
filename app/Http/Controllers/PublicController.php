<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Location;
use App\Models\GuestHouse;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function home()
    {
        $guest_houses = GuestHouse::where('is_accepted', true)
        ->orderBy('created_at', 'desc')->take(5)->get();
        
        return view('home', compact('guest_houses'));
    }
    
    
    public function terms()
    {
        return view('terms.terms');
    }
    public function privacy()
    {
        return view('terms.privacy');
    }
    public function services()
    {
        return view('terms.services');
    }
    
    public function index(){
        $guest_houses = GuestHouse::where('is_accepted', true) //solo quelli is_accepted=true
        ->orderBy('created_at', 'desc') //ordine decrescente per data di creazione
        ->paginate(6); //La funzione paginate mi permette di mostrare nella pagina solo un tot di articoli
        
        $locations = Location::all();
        $icons = ['fa-water', 'fa-mountain', 'fa-fish-fins', 'fa-tree-city', 'fa-snowflake', 'fa-sun-plant-wilt', 'fa-horse-head'];
        
        //dd($guest_houses);
        
        return view('product.index', compact('guest_houses', 'locations', 'icons'));
    }
    
    public function categoryShow(Location $location){
        $icons = ['fa-water', 'fa-mountain', 'fa-fish-fins', 'fa-tree-city', 'fa-snowflake', 'fa-sun-plant-wilt', 'fa-horse-head'];
        
        return view('product.category-show', compact('location', 'icons'));
    }
    
    public function searchHouse(Request $request){
        $guest_houses = GuestHouse::search($request->searched)->where('is_accepted', true)->paginate(6);
        $locations = Location::all();
        return view('product.index', compact('guest_houses', 'locations'));
    }
    
    public function contactUs(){
        return view('mail.contact-us');
    }
    

    
    public function setLanguage($lang)
    {
        session()->put('locale', $lang);
        
        
        return redirect()->back();
    }
    
    
    // public function  trasferimentoDati()
    // {
        //     $products = GuestHouse::all();
        //     foreach ($products as $product) {
            //         $images = $product->images()->get();
            //         if ($images->isEmpty()) {
                //             $product->images()->create([
                    //                 'path' => $product->img,
                    //                 'guest_house_id' => $product->id,
                    //             ]);
                    //         } else {
                        //             $product->images()->delete();
                        //             foreach ($images as $image) {
                            //                 $product->images()->create([
                                //                     'path' => $image->image,
                                //                     'guest_house_id' => $product->id,
                                //                 ]);
                                //             }
                                //         }
                                //     }
                                
                                //     return redirect(route('home'));
                                // }
                            }
                            