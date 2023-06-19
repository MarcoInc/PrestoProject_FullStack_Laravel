<?php

namespace App\Http\Controllers;

use App\Models\GuestHouse;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profilo(){
        //crea un array delle sole Song in cui user_id è uguale all'id dell'Utente e le ordina in base al titolo ascendente
        $houses = GuestHouse::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        
        return view('account.profilo', compact('houses'));
    }
    
    public function userProfile($id){
        $houses = GuestHouse::where('user_id', $id)->where('is_accepted', true)->orderBy('updated_at', 'desc')->get();
        $profile = User::findOrFail($id)->profile;
        $user = User::find($id);        
        return view('account.user', compact('houses', 'profile', 'user'));
    }

    public function edit(User $user){
        // if(Auth::user() && Auth::user()->id==$user->profile->user_id)
        // && Auth::user()->id==$user->profile->user_id     
        // $profile = Profile::where('user_id', Auth::user()->id) ;

        if($user->profile() && Auth::user()->id ==$user->id){
            // $user = User::where('id', $profile->user_id);
            return view('account.edit_profile', compact('user'));
        }
        else if(Auth::user()->id ==$user->id){
            return view('account.edit_profile');
        }
            
        $guest_houses= GuestHouse::all();
        return redirect(route('home'))->with(compact('guest_houses'));
        
    }
    

    
    public function destroy(GuestHouse $house)
    {   

        // $houses = GuestHouse::where('user_id', $id)->where('is_accepted', true)->orderBy('updated_at', 'desc')->get();
        // $profile = User::findOrFail($id)->profile;
        
        // $user = User::find($id);
        
        
        if(Auth::user() && Auth::user()->name==$house->user->name){
        
          $house->delete();
          return redirect()->back()->with('message', __('messages.correctDelete'));
        }
    

       
    }
    


}
