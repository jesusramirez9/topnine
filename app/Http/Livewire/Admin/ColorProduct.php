<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use App\Models\ColorProduct as Pivot;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class ColorProduct extends Component
{
    use WithFileUploads;

    public $product, $colors, $color_id, $quantity, $open = false, $imageColor, $editImage = null;
    public $pivot, $pivot_color_id, $pivot_quantity, $pivot_image;

    protected $listeners = ['delete'];

    protected $rules = [
        'color_id' => 'required',
        'quantity' => 'required|numeric'
    ];

    public function mount()
    {
        $this->colors = Color::all();
    }

    public function save()
    {
        if ($this->imageColor) {
            $this->rules['imageColor'] = 'image|max:1024';
        }

        $this->validate();

        $pivot = Pivot::where('color_id', $this->color_id)
            ->where('product_id', $this->product->id)
            ->first();

        if ($pivot) {
            $pivot->quantity = $pivot->quantity + $this->quantity;
            if ($this->imageColor) {
                $pivot->image = $this->imageColor->store('products');
            }
            $pivot->save();
        } else {
            $image = null;
            if ($this->imageColor) {
                $image = $this->imageColor->store('products');
            }
            $this->product->colors()->attach([
                $this->color_id => [
                    'quantity' => $this->quantity,
                    'image' => $image
                ]
            ]);
        }

        $this->reset(['color_id', 'quantity', 'imageColor']);
        $this->emit('saved');
        $this->product = $this->product->fresh();
    }


    public function edit(Pivot $pivot)
    {
        $this->open = true;
        $this->pivot = $pivot;
        $this->pivot_color_id = $pivot->color_id;
        $this->pivot_quantity = $pivot->quantity;
        $this->pivot_image = $pivot->image;
    }

    public function update()
    {
        $rules = [
            'pivot_color_id' => 'required',
            'pivot_quantity' => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'image|max:1024';
        }

        $this->validate($rules);

        $this->pivot->color_id = $this->pivot_color_id;
        $this->pivot->quantity = $this->pivot_quantity;

        if ($this->editImage) {
            Storage::delete($this->pivot_image);
            $this->pivot->image = $this->editImage->store('products');
        }

        $this->pivot->save();
        $this->reset('editImage');
        $this->product = $this->product->fresh();
        $this->open = false;
    }

    public function delete(Pivot $pivot)
    {
        if($pivot->image){
            Storage::delete($pivot->image);
        }
        $pivot->delete();
        $this->product = $this->product->fresh();
    }

    public function render()
    {
        $product_colors = $this->product->colors;
        return view('livewire.admin.color-product', compact('product_colors'));
    }
}
