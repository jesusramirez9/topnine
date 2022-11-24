<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Subcategory;
use Livewire\Component;

class ProductsAll extends Component
{
    public function render(Product $product, Subcategory $subcategory)
    {
        $subcategories = Subcategory::all();
        return view('livewire.products-all', compact('product','subcategories'));
    }
}
