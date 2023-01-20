<?php

namespace App\Http\Livewire\Admin;

use App\Models\Order;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserComponent extends Component
{
    use WithPagination;
    public $search;
    public $order;

    public function mount(Order $order){
        $this->order = $order;
    }

    public function updatingSearch(){
        $this->resetPage();
    }
    public function assignRole(User $user, $value){

        if ($value == '1') {
            # code...
            $user->assignRole('admin');
        } else {
            $user->removeRole('admin');
        }

    }

    public function render()
    {

        $users = User::where('email', '<>', auth()->user()->email)
        ->where(function($query){
            $query->where('name','LIKE', '%'. $this->search .'%');
            $query->orWhere('email','LIKE', '%'. $this->search .'%');
        })
        ->paginate();

        $orders = Order::all();


        return view('livewire.admin.user-component', compact('users','orders'))->layout('layouts.admin');
    }
}
