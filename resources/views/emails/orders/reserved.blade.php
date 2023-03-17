@component('mail::message')
# Estado de la compra : Confirmado

<div align="center" style="margin: 1rem 0rem;">
    Listo para entregar
</div>

Hola {{ $order->user()->first()->name }} te informamos que tu producto ya se encuentra listo. <br>
Te detallamos el resumen de tu compra.
@component('mail::panel')
Tu numero de pedido es: <b> compra-000{{ $order->id }}</b> <br> <br>
@foreach ($items as $item)
Producto: <b>{{ $item->name }}</b> <br>
@endforeach 
<p>Costo de envío: {{$order->shipping_cost}}</p>
<br>
@if ($envio == null || $envio  == "")
<p>Tendrás que recogerlo en la siguiente dirección:</p>
<p>Calle las cantuarias - sotano - tienda 48</p> 
<p>Horarios de atención:</p>
<p>L-V de 9:00 a 19:00 <br>
   Sábados de 8:00 a 14:00</p>
@else
<p>Tu producto se encuentra listo y</p>
<p>Se enviara al siguiente punto:</p>
<p>{{$envio->address}}</p>
<p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}</p>
@endif

@endcomponent
@component('mail::table')
       
| Precio | Cantidad | Total |
| ------------- |:-------------:| --------:|
@foreach ($items as $item)
| S/{{ $item->price }} | {{ $item->qty }}  | S/ {{ $item->price * $item->qty}} |
@endforeach
| Total + Envio: S/ {{ $order->total }} nuevos soles (Inc IGV)   
       
@endcomponent

En caso tengas algún inconveniente con tu compra puedes <br> escribirnos a: 
info@trepstom.com o enviarnos un mensaje a nuestro <br> wsp: +51 962 755 078 <br>
Gracias, <br>

Topnain
@endcomponent
