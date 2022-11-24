<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;

class CategoriesSubcategory extends Component
{
    public function render(Product $product, Subcategory $subcategory)
    {
        $categories = Category::all();
        $products = Product::all();
        $subcategories = Subcategory::all();
        return view('livewire.categories-subcategory', compact('categories','products','subcategories'));
    }
}
