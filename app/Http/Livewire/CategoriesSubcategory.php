<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Subcategory;
use Livewire\Component;

class CategoriesSubcategory extends Component
{

    public function render(Product $product, Subcategory $subcategory)
    {
        $categories = Category::all();
        $productsSection1 = Product::where('status', 2)->inRandomOrder()->limit(10)->get();
        $productsSection2 = Product::where('status', 2)->inRandomOrder()->limit(10)->get();
        $offerProducts = Product::where([['inOffer', '2'], ['status', '2']])->inRandomOrder()->limit(10)->get();
        $subcategories = Subcategory::all();
        $banners = Slider::where([['type', '1'], ['status', '1']])->orderBy('order', 'asc')->get();
        return view('livewire.categories-subcategory', compact('categories','productsSection1','productsSection2','offerProducts','subcategories','banners'));
    }
}
