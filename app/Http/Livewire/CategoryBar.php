<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;

class CategoryBar extends Component
{


    public function render()
    {
        $locations=Location::all();
        $icons = ['fa-water', 'fa-mountain','fa-fish-fins', 'fa-tree-city', 'fa-snowflake','fa-sun-plant-wilt', 'fa-horse-head'];
        return view('livewire.category-bar', compact('locations', 'icons'));
    }
}
