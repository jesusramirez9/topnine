<?php

namespace App\Http\Livewire;

use App\Mail\NewPedido;
use App\Models\City;
use App\Models\Department;
use App\Models\District;
use App\Models\Order;
use App\Models\User;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;



class CreateOrder extends Component
{   
     


    public $prenda = 0;


    public $envio_type = 1;

    public $address, $contact, $phone, $shipping_cost = 0;

    public $references;
    // pago realizado = 1
    // pendiente de pago <> 1
    public $verificar_pago = 1;

    public $departments, $cities = [], $districts=[];

    public $department_id = "", $city_id= "", $district_id= "";

    public $rules = [
        'contact' => 'required',
        'phone' => 'required',
        'envio_type' => 'required'
    ];

    public function mount(){
        $this->departments = Department::all();
          $qty_total = 0;
        // foreach (Cart::content() as $item) {
        //     $qty_total += $item->qty; 
        //  }
         
        //  if($qty_total == 1){
        //     $this->shipping_cost = 15;
        //  }elseif($qty_total == 2){
        //     $this->shipping_cost = 20;
        //  }else{
        //     $this->shipping_cost = 0;
        //  }

    }

  
    public function updatedEnvioType($value){
        if ($value == 1) {
           $this->resetValidation([
            'department_id', 'city_id', 'district_id','address', 'references'
           ]);
        }
    }

    public function updatedDepartmentId($value){
        $this->cities = City::where('department_id', $value)->get();
        $this->reset(['city_id', 'district_id']);
    
    }

    public function updatedCityId($value){

       
    //     $city = City::find($value);
    //     $districts = District::find($value);
    //    $this->shipping_cost = $districts->cost;

        $this->districts = District::where('city_id', $value)->get();
        $this->reset('district_id');
    }
    public function updatedDistrictId($value){

        $districts = District::find($value);
        $this->shipping_cost = $districts->cost;
        

    }

    public function create_order(){
        $rules = $this->rules;

        if ($this->envio_type == 2) {
           $rules['department_id'] = 'required';
           $rules['city_id'] = 'required';
           $rules['district_id'] = 'required';
           $rules['address'] = 'required';
           $rules['references'] = 'required';
        }
        $this->validate($rules);
    
        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->contact = $this->contact;
        $order->phone = $this->phone; 
        $order->envio_type = $this->envio_type;
        $order->shipping_cost = 0;
        $order->total = $this->shipping_cost + filter_var(Cart::subtotal(), FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
       
        $order->content = Cart::content();

        if($this->envio_type == 2){
          $order->shipping_cost = $this->shipping_cost;
            // $order->shipping_cost = 20;

            
          /*  $order->department_id = $this->department_id;
            $order->city_id = $this->city_id;
            $order->district_id = $this->district_id;
            $order->address = $this->address;
            $order->references = $this->references;*/

            $order->envio = json_encode([
                'department' => Department::find($this->department_id)->name,
               
                'city' => City::find($this->city_id)['name'],
                'district' => District::find($this->district_id)['name'],
                'address' => $this->address,
                'references' => $this->references,
                'verificar_pago' => $this->verificar_pago,
            ]);

        }

        $order->save();

        foreach (Cart::content() as $item) {
           discount($item);
        }

        Cart::destroy();


        return redirect()->route('orders.payment', $order);
      
    }

    public function render()
    {
        $user= User::all();
      
        return view('livewire.create-order', compact('user'));
    }
}
