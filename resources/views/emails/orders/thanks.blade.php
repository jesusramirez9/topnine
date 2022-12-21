@component('mail::message')
# Gracias por confiar en nosotros

<div align="center" style="margin: 1rem 0rem;">
    <b> Entrega completada </b> 
</div>

Muchas Gracias {{ $order->user()->first()->name }}! <br>
Hemos completado el proceso de compra satisfactoriamente. <br>

En caso tengas algún tipo de sugerencia con respecto a nuestros servicios puedes <br> escribirnos a: 
sugerencias@topnain.com o enviarnos un mensaje a nuestro <br> wsp: +51  962 755 078 <br>
Gracias, <br>

Topnain
@endcomponent
