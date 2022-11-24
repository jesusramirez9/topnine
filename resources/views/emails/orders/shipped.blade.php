@component('mail::message')
# Estado de la compra : Pendiente

<div align="center" style="margin: 1rem 0rem;">
    <b> PROCESANDO </b>---- COMPRADO 
</div>

Gracias! Hemos recibido tu pedido y estamos procesando tu compra. <br>
Te detallamos el resumen de tu compra.
@component('mail::panel')
Bienvenido: <b> {{ $order->user()->first()->name }} </b><br>
Tu numero de compra es: <b> compra-000{{ $order->id }}</b> <br>

@foreach ($items as $item) <br>
Producto: <b>{{ $item->name }}</b> <br>
@isset($item->options->color)
Color: {{ __($item->options->color) }}<br>
@endisset
@isset($item->options->size)
 - Talla: {{ $item->options->size }}<br>
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

En caso tengas algún inconveniente con tu compra puedes <br> escribirnos a: 
info@topnain.com o enviarnos un mensaje a nuestro <br> wsp: +51 987 654 321 <br>
Gracias, <br>

{{ config('app.name') }}
@endcomponent
