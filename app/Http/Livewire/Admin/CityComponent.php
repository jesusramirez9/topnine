<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\District;
use Livewire\Component;

class CityComponent extends Component
{
   
    protected $listeners = ['delete'];

    public $districts, $city, $district;

    public $createForm = [
        'name' => '',
        'cost'=>null
    ];

    public $editForm = [
        'open' => false,
        'name' => '',
        'cost'=> null
 
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre',
        'createForm.cost' => 'costo'
    ];
  
    public function mount(City $city){
        $this->city = $city;
        $this->getDistricts();
    }
    public function getDistricts(){
        $this->districts = District::where('city_id', $this->city->id)->get();

    }
    public function save(){

        $this->validate([
            "createForm.name" => 'required',
            "createForm.cost" => 'required|numeric|min:1|max:100'
        ]);

        $this->city->districts()->create($this->createForm);

        $this->reset('createForm');

        $this->getDistricts();

        $this->emit('saved');
    }

    public function edit(District $district){
        $this->district = $district;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $district->name;
        $this->editForm['cost'] = $district->cost;

    }
    
    public function update(){
   

        $this->district->name = $this->editForm['name'];
        $this->city->cost = $this->editForm['cost'];
        
        $this->district->save();

        $this->reset('editForm');

        $this->getDistricts();
    } 


    public function delete(District $district){
        $district->delete();
        $this->getDistricts();

    }
    public function render()
    {
        return view('livewire.admin.city-component')->layout('layouts.admin');
    }
}
