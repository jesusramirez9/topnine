<?php

namespace App\Http\Livewire;

use App\Mail\NewPedido;
use App\Mail\OrderShipped;
use App\Models\Order;
use GuzzleHttp\Psr7\Request;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Support\Facades\Mail;
use App\Mail\ResumenMailable;

class PaymentOrder extends Component
{
    use AuthorizesRequests;
    

    public $order;

    protected $listeners = ['payOrder'];

    public function mount(Order $order){
        $this->order = $order;
    }

    public function store(Request $request){


        

    }

    public function payOrder(){
        $this->authorize('author', $this->order);

        $this->order->status = 2;
       $this->order->save();

       $correo = new OrderShipped($this->order);
       Mail::to( auth()->user()->email)->send($correo);
       $this->enviarCorreo();
      // $correo2 = new NewPedido($this->order);
     //  Mail::to('jesus.ramirez9@unmsm.edu.pe')->send($correo2);

        return redirect()->route('orders.show', $this->order);
    }
    // cambie estso
    public function create_order(){
        $this->order->status = 2;
        $this->order->save();

        $correo = new OrderShipped($this->order);
        Mail::to( auth()->user()->email)->send($correo);

        $pendientePago = 2;

    //    $correo2 = new NewPedido($this->order);
    //    Mail::to('jesus.ramirez9@unmsm.edu.pe')->send($correo2);
    //    Mail::to('jesus.ramirez9@unmsm.edu.pe')->send($correo);

        return redirect()->route('orders.show', $this->order);
    }

      public function enviarCorreo(){

        $correo = new NewPedido($this->order);
        Mail::to('jesus.ramirez9@unmsm.edu.pe')->send($correo);

      }  



    public function render()
    {
        // $this->authorize('payment', $this->order);
        $this->authorize('author', $this->order);
        $items = json_decode($this->order->content);
        $envio = json_decode($this->order->envio);
        $verify_pago = 1;

        return view('livewire.payment-order', compact('items', 'envio','verify_pago'));
    }
}
