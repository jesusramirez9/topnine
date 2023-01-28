@component('mail::message')
Se ha realizado un pedido desde la WEB<br>
Te detallamos el resumen de la compra.
@component('mail::panel')
El cliente: <b> {{ $order->user()->first()->name }} </b><br>
Con el numero de compra: <b> compra-000{{ $order->id }}</b> <br>
a solicitado lo siguiente:
@foreach ($items as $item) <br>
Producto: <b>{{ $item->name }}</b> <br>
@isset($item->options->color)
Color: {{ __($item->options->color) }}<br>
@endisset
@isset($item->options->size)
 - Medida: {{ $item->options->size }}<br>
@endisset
@endforeach
@endcomponent

@component('mail::table')
       
| Precio | Cantidad | Total |
| ------------- |:-------------:| --------:|
@foreach ($items as $item)
| S/{{ $item->price }} | {{ $item->qty }}  | S/ {{ $item->price * $item->qty }} |
@endforeach
| Total: S/ {{ $order->total }} nuevos soles (Inc IGV)       
@endcomponent

@if ($envio == null || $envio  == "")
<p>El cliente lo recogerá en la siguiente dirección:</p>
<p>Calle las cantuarias - sotano - tienda 48</p> 
<p>Horarios de atención:</p>
<p>L-V de 9:00 a 19:00 <br>
   Sábados de 8:00 a 14:00</p>
@else
<p>El producto será enviado al siguiente punto:</p>
<p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}</p>
@endif


Topnain
@endcomponent
