<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;

class FirstCategory extends Component
{
    public function render()
    {
        $categories = Category::all();
        $products = Product::all();
        $subcategories = Subcategory::all();
        return view('livewire.first-category', compact('categories','products','subcategories'));
    }
}
