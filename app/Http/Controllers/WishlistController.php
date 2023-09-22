<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wishlist;
use App\Models\GuestHouse;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function wishlist(){
        // $wishlist=Wishlist::find(Auth::user()->id);

        // return view('account.wishlist', compact('wishlist'));
        $wishedItems=WishlistItem::where('wishlist_id',Auth::user()->id)
            ->orderBy('updated_at', 'desc')->get();
            return view('account.wishlist', compact('wishedItems'));
    }
    
    
    

    public function flush(){   
        $wishlist_id=Wishlist::find(Auth::user()->id);
        $toFlush=WishlistItem::where('wishlist_id', $wishlist_id);
        return redirect(route('wishlist'))->with('flushOK', __('messages.flushOK'));

    }

    
}
