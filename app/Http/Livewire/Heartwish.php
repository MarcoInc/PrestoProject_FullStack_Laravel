<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use App\Models\GuestHouse;
use App\Models\WishlistItem;
use Illuminate\Support\Facades\Auth;

class Heartwish extends Component
{
    public $house, $wishedItems,$heart;
    private $wishlist, $item;

    public function render()
    {
        return view('livewire.heartwish', 
        ['house' => $this->house, 'wishedItems' => $this->wishedItems, 'heart' => $this->heart]);
    }

    public function mount(){
        $this->heart=$this->wishedItems->contains('house_id',$this->house->id) ? "bi-suit-heart-fill" : "bi-suit-heart" ;
    }

    public function add()
    {
        $this->heart="bi-suit-heart-fill";

        $auth_user_id = Auth::user()->id;
        Wishlist::updateOrCreate(['user_id' => $auth_user_id]);

        $this->wishlist = Wishlist::where('user_id', $auth_user_id)->first();

        WishlistItem::firstOrCreate([
            'house_id' => $this->house->id,
            'wishlist_id' => $this->wishlist->id
        ]);
    }

    public function remove()
    {
        $this->heart="bi-suit-heart";
        $this->item = WishlistItem::where([
            ['house_id', $this->house->id],
            ['wishlist_id', Auth::user()->id]
        ]);
        $this->item->delete();
    }
    
}

