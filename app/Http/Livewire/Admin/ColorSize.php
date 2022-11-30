<?php

namespace App\Http\Livewire\Admin;

use App\Models\Color;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

use App\Models\ColorSize as Pivot;

class ColorSize extends Component
{
    use WithFileUploads;

    public $size, $colors, $color_id, $quantity, $open = false, $imageColor, $editImage = null;
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
            ->where('size_id', $this->size->id)
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
            $this->size->colors()->attach([
                $this->color_id => [
                    'quantity' => $this->quantity,
                    'image' => $image
                ]
            ]);
        }

        $this->reset(['color_id', 'quantity', 'imageColor']);
        $this->emit('saved');
        $this->size = $this->size->fresh();
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
        $this->size = $this->size->fresh();
        $this->open = false;
    }

    public function delete(Pivot $pivot)
    {
        $pivot->delete();
        $this->size = $this->size->fresh();
    }

    // public function destroy(Pivot $pivot){
    //     $pivot->delete();
    //     $this->size = $this->size->fresh();
    // }

    public function render()
    {
        $size_colors = $this->size->colors;
        return view('livewire.admin.color-size', compact('size_colors'));
    }
}
