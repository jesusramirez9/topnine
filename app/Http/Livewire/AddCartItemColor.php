<?php

namespace App\Http\Livewire;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class AddCartItemColor extends Component
{
    use LivewireAlert;
    public $product;
    public $color_id = "";
    public $qty = 1;
    public $open_edit = false;
    public $quantity = 0;
    public $options = [
        'size_id' => null
    ];

    public function mount(){
        $this->options['image'] = Storage::url($this->product->images->first()->url);
    }
    
    public function decrement(){
        $this->qty = $this->qty - 1;
    }
    public function increment(){
        $this->qty = $this->qty + 1;
    }
    public function updatedColorId($value){
        $color = $this->product->colors->find($value);
        $this->quantity = qty_available($this->product->id, $color->id);
        $this->options['color'] = $color->name;
        $this->options['color_id'] = $color->id;

    }

    public function addItem(){
        Cart::add([
            'id' => $this->product->id,
            'name' => $this->product->name,
            'qty' => $this->qty,
            'price' => $this->product->price,
            'weight' => 550,
            'options' => $this->options
        ]);

        $this->quantity = qty_available($this->product->id, $this->color_id);
        $this->open_edit = true;
        $this->alert('success', 'Producto agregado');
        $this->reset('qty');
        $this->emitTo('modal-cart','render');
        $this->emitTo('dropdown-cart','render');
    }
    public function cerrar(){
        $this->open_edit = false;

    }
    public function render()
    {
        $colors = $this->product->colors;
        return view('livewire.add-cart-item-color', compact('colors'));
    }
}
