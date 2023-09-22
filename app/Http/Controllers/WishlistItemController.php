<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\GuestHouse;
use App\Models\WishlistItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistItemController extends Controller{
    public function __construct(){
        $this->middleware('auth');
    }
    public function add(GuestHouse $house){

        $auth_user_id=Auth::user()->id;
        Wishlist::updateOrCreate(['user_id' => $auth_user_id]);

        $wishlist=Wishlist::find($auth_user_id);

        WishlistItem::firstOrCreate([
            'house_id'=>$house->id,
            'wishlist_id'=>$wishlist->id
        ]);
        return redirect()->back();
    }

    public function remove(GuestHouse $house){
        $item=WishlistItem::where([
            ['house_id', $house->id],
            ['wishlist_id', Auth::user()->id]]);
        $item->delete();
        return redirect()->back();

    }

    
}
