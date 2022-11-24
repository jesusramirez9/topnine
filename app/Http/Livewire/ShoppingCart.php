<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Subcategory;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{

    protected $listeners = ['render'];

    public function destroy(){
        Cart::destroy();

        $this->emitTo('dropdown-cart','render');
    }

    public function delete($rowId){
        Cart::remove($rowId);
        $this->emitTo('dropdown-cart','render');
    }

    public function render(Product $product, Subcategory $subcategory)
    {
        $subcategories = Subcategory::all();
        return view('livewire.shopping-cart', compact('product','subcategories'));
    }

 
}
