<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use App\Models\Department;
use Livewire\Component;

class ShowDepartment extends Component
{

    protected $listeners = ['delete'];

    public $cities, $city, $department;

    public $createForm = [
        'name' => '',
    ];

    public $editForm = [
        'open' => false,
        'name' => ''
    ];

    protected $validationAttributes = [
        'createForm.name' => 'nombre'
    ];

 

    public function mount(Department $department){
        $this->department = $department;
        $this->getCities();
    }
    public function getCities(){
        $this->cities = City::where('department_id', $this->department->id)->get();

    }

    public function save(){

        $this->validate([
            "createForm.name" => 'required'
        ]);

        $this->department->cities()->create($this->createForm);

        // City::create($this->createForm);

        $this->reset('createForm');
        $this->getCities();
        $this->emit('saved');
    }

    public function edit(City $city){
        $this->city = $city;
        $this->editForm['open'] = true;
        $this->editForm['name'] = $city->name;

    }

    public function update(){
        $this->city->name = $this->editForm['name'];

        $this->city->save();

        $this->reset('editForm');
        $this->getCities();
    } 
    public function delete(City $city){
        $city->delete();
        $this->getCities();

    }
    
    public function render()
    {
        return view('livewire.admin.show-department')->layout('layouts.admin');
    }
}
