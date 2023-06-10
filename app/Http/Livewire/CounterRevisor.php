<?php

namespace App\Http\Livewire;

use App\Models\GuestHouse;
use Livewire\Component;

class CounterRevisor extends Component
{
    

    
    public function render()
    {
        return view('livewire.counter-revisor', compact('value'));
    }
}
