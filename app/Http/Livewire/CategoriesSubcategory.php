<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;

class CategoriesSubcategory extends Component
{
    public function render()
    {
        $categories = Category::all();
        return view('livewire.categories-subcategory', compact('categories'));
    }
}
