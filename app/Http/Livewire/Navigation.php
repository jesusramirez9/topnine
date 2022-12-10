<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Slider;
use App\Models\Subcategory;
use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        $categories = Category::all();
        $bannerHeader = Slider::where([['type', '2'], ['status', '1']])->first();
        $subcategories = Subcategory::all();
        return view('livewire.navigation', compact('categories','bannerHeader','subcategories'));
    }
}
