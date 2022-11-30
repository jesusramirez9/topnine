<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;

class SliderFlayer extends Component
{
    use WithFileUploads;

    public $rand, $sliders, $slider, $editImage;

    protected $listeners = ['delete'];

    public $createForm = [
        'name' => null,
        'order' => null,
        'image' => null,
        'status' => null
    ];

    public $editForm = [
        'open' => false,
        'name' => null,
        'order' => null,
        'image' => null,
        'status' => null
    ];

    protected $rules = [
        'createForm.name' => 'required',
        'createForm.order' => 'required|unique:sliders,order',
        'createForm.image' => 'required|image|max:1024',
        'createForm.status' => 'required',
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.order' => 'orden',
        'createForm.image' => 'imagen',
        'createForm.status' => 'estado',

        'editForm.name' => 'nombre',
        'editForm.order' => 'orden',
        'editImage' => 'imagen',
        'editForm.status' => 'estado',
    ];

    public function mount()
    {
        $this->getSliders();
        $this->rand = rand();
    }

    public function getSliders()
    {
        $this->sliders = Slider::all();
    }

    public function save()
    {
        $this->validate();

        $image =  $this->createForm['image'];
        if($image){
            $image = $image->store('sliders');
        }
        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('sliders');
        }

        Slider::create([
            'name' => $this->createForm['name'],
            'order' => $this->createForm['order'],
            'status' => $this->createForm['status'],
            'image' => $image
        ]);

        $this->reset('createForm');

        $this->getSliders();
        $this->emit('saved');
    }

    public function edit(Slider $slider)
    {
        $this->reset(['editImage']);
        $this->resetValidation();

        $this->slider = $slider;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $slider->name;
        $this->editForm['order'] = $slider->order;
        $this->editForm['status'] = $slider->status;
        $this->editForm['image'] = $slider->image;
    }

    public function update()
    {
        $rules = [
            'editForm.name' => 'required',
            'editForm.order' => 'required|unique:sliders,order,' . $this->slider->id,
            'editForm.status' => 'required',
        ];

        if ($this->editImage) {
            $rules['editImage'] = 'image|max:1024';
        }

        $this->validate($rules);

        if ($this->editImage) {
            Storage::delete($this->editForm['image']);
            $this->editForm['image'] = $this->editImage->store('sliders');
        }

        $this->slider->update($this->editForm);

        $this->reset(['editForm', 'editImage']);
        $this->getSliders();
    }

    public function delete(Slider $slider)
    {
        $slider->delete();
        $this->getSliders();
    }

    public function render()
    {
        return view('livewire.admin.slider-flayer')->layout('layouts.admin');
    }
}
