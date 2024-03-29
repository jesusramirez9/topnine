<div>
    @php
        require_once base_path('/vendor/autoload.php');
        
        Lyra\Client::setDefaultUsername('97475328');
        Lyra\Client::setDefaultPassword('testpassword_57D3zNe8v1yHJ4JyxsWdQpk3bOLCXDjlGbnNy985AhSD2');
        Lyra\Client::setDefaultEndpoint('https://api.micuentaweb.pe');
        Lyra\Client::setDefaultPublicKey('97475328:testpublickey_t98Lu0jqg3XAaME4769MHaMhX5vUap38ijZ4zQ85d78Sw');
        
        Lyra\Client::setDefaultSHA256Key('DnjJTV6w4AalS1EqqhHRqy5NIxZ9R5ubeIVxlfmKgjgkq');
        $client = new Lyra\Client();
        
        $store = [
            'amount' => round($order->total * 100, 2),
            'currency' => 'PEN',
            'orderId' => uniqid($order->id . '-'),
            'customer' => [
                'email' => auth()->user()->email,
            ],
        ];
        $response = $client->post('V4/Charge/CreatePayment', $store);
        
        if ($response['status'] != 'SUCCESS') {
            display_error($response);
            $error = $response['answer'];
            throw new Exception('error ' . $error['errorCode'] . ': ' . $error['errorMessage']);
        }
        
        $formToken = $response['answer']['formToken'];
        
    @endphp

    @push('link')
        <link rel="stylesheet" href="<?php echo $client->getClientEndpoint(); ?>/static/js/krypton-client/V4.0/ext/classic-reset.css">
        <script src="<?php echo $client->getClientEndpoint(); ?>/static/js/krypton-client/V4.0/ext/classic.js"></script>
    @endpush
    <div class="bg-red-600 py-6">
        <p class="text-center text-white text-lg xl:text-2xl font-semibold">
            Orden de compra
        </p>
        <div class="text-center">
            <a href="/" class="text-white underline text-sm">Ir al inicio</a>
        </div>
    </div>
    <div class="bg-gray-100">
        <div class="md:grid  md:grid-cols-5 gap-6 container py-8">

            <div class="md:col-span-3 ">
                <div class="bg-white rounded-lg shadow-lg  md:mt-0 px-4 md:px-6 py-4 mb-6">
                    <p class="colorbroywm font-bold uppercase"> <span class=" font-bold">Número de
                            compra:</span>
                        Compra-000{{ $order->id }}</p>
                </div>
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="my-5">
                        <p class="text-orange-500 text-2xl font-semibold"> Comprueba tus datos antes de finalizar tu
                            compra</p>

                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-gray-700">
                        <div>
                            <p class="text-lg  font-bold uppercase">Datos de la compra</p>
                            @if ($order->envio_type == 1)
                                <p class="text-sm colorbroywm font-bold">Serán recogidos en:</p>
                                <p class="text-sm colorbroywm font-bold">Calle cantuarias 140 - semisotano - Puesto 48</p>
                            @else
                                <p class="text-sm colorbroywm font-bold">Será enviado a:</p>
                                <p class="text-sm">{{ $envio->address }}</p>
                                <p class="colorbroywm font-normal">{{ $envio->department }} - {{ $envio->city }} -
                                    {{ $envio->district }}</p>
                                <p class="text-sm colorbroywm font-bold">Referencia:</p>
                                <p class="colorbroywm font-normal">{{ $envio->references }}</p>
                            @endif
                        </div>

                        <div>
                            <p class="text-lg  font-bold uppercase">Datos de contacto principal</p>
                            <p class="text-sm  font-bold">Responsable del producto: </p>
                            <p class="colorbroywm font-normal"> {{ $order->contact }}</p>
                            <p class="text-sm  font-bold">Celular de contacto: </p>
                            <p class="colorbroywm font-normal">{{ $order->phone }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-6 mb-6 text-gray-700">
                    <p class="text-xl  font-bold mb-4">Resumen de tus productos</p>

                    <table class="table-auto w-full">
                        <thead>
                            <tr class=" font-bold">
                                <th></th>
                                <th class="text-xs sm:text-base">Precio</th>
                                <th class="text-xs sm:text-base">Cant.</th>
                                <th class="text-xs sm:text-base">Total</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">

                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <div class="flex ">
                                            <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                                alt="">
                                            <article>
                                                <h1 class="font-bold txttitel_resumen">{{ $item->name }}</h1>
                                                <div class="flex text-xs txttitel_resumen">
                                                    @isset($item->options->color)
                                                        Color: {{ __($item->options->color) }}
                                                    @endisset

                                                    @isset($item->options->size)
                                                        - Medida: {{ $item->options->size }}
                                                    @endisset
                                                </div>
                                            </article>
                                        </div>
                                    </td>
                                    <td class="text-center colorbroywm font-bold">
                                        S/ {{ $item->price }}
                                    </td>
                                    <td class="text-center colorbroywm font-bold">
                                        {{ $item->qty }}
                                    </td>
                                    <td class="text-center colorbroywm font-bold">
                                        S/ {{ $item->price * $item->qty }}
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>



            </div>
            <div class="md:col-span-2">
                <div class="bg-white rounded-lg shadow-lg px-4 md:px-6 pt-6 pb-6">
                    <div class="flex justify-between items-center mb-4">
                        <div class="">
                            <img src=" {{ asset('images/bolsacompra1/visa.jpg') }}" class="h-15 w-20 object-cover"
                                alt="">
                            <img src="{{ asset('images/bolsacompra1/mastercard.jpg') }}" class="h-15 w-20 object-cover"
                                alt="">
                        </div>
                        <div class="">
                            <img src="
                        {{ asset('images/bolsacompra1/american.jpg') }}"
                                class="h-15 w-20 object-cover" alt="">
                            <img src="{{ asset('images/bolsacompra1/diners.jpg') }}" class="h-15 w-20 object-cover"
                                alt="">

                        </div>
                        <div class=" ml-4">

                            <div class="flex justify-between text-sm font-semibold">
                                <p>Subotal: </p>
                                <p>S/{{ $order->total - $order->shipping_cost }}</p>
                            </div>
                            <div class="flex justify-between text-sm font-semibold ">
                                <p>Envio: </p>
                                <p>S/{{ $order->shipping_cost }}</p>
                            </div>

                            <hr class="bg-gray-800 my-3">
                            <p class="mb-3 text-lg font-semibold ">
                                Total: S/ {{ $order->total }}
                            </p>

                            {{-- <div class="cho-container">
                        </div> --}}

                        </div>
                    </div>
                    <hr class="bg-gray-400 my-8">
                    {{-- <div id="paypal-button-container"></div> --}}
                    {{-- // cambie estso --}}

                    {{-- <x-jet-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4 bgvrdff"
                    wire:click="create_order">
                    Realizar pedido
                </x-jet-button> --}}
                <div class="text-center mb-8">
                    <p>Formas de obtener el producto</p>
                </div>
                    <div x-data="{ open: false }">
                        <button
                            class="py-2.5 px-4 border bg-gray-100 hover:bg-gray-200 border-gray-300 rounded-full w-full inline-flex justify-between items-center"
                            x-on:click="open = !open">
                            Tarjeta de Débito/Crédito
                            <img class="h-3" src="https://codersfree.com/img/payments/credit-cards.png"
                                alt="">
                        </button>

                        <div x-show="open" x-transition="" class="my-6" style="display: none;">
                            <div class="flex justify-center">
                                <div class="kr-embedded " kr-form-token="<?php echo $formToken; ?>">
                                    <!-- payment form fields -->
                                    <div class="kr-pan"></div>
                                    <div class="kr-expiry"></div>
                                    <div class="kr-security-code"></div>
        
                                    <!-- payment form submit button -->
                                    <button class="kr-payment-button"></button>
        
                                    <!-- error zone -->
                                    <div class="kr-form-error"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="my-6" x-data="{ open: false }">
                        <button
                            class="py-2.5 px-4 border bg-gray-100 hover:bg-gray-200 border-gray-300 rounded-full w-full inline-flex justify-between items-center"
                            x-on:click="open = !open">
                            Solo quiero reservar
                            
                        </button>
                        <div x-show="open" x-transition="" class="my-3" style="display: none;">
                            <div class="flex justify-center">
                                <x-jet-button wire:loading.attr="disabled" wire:target="create_order" class="mt-6 mb-4 "
                                    wire:click="create_order">
                                    Realizar reserva
                                </x-jet-button>
                            </div>
                        </div>
                    </div>

                    
                    <div class="text-center">
                        <p class="text-sm font-light">* Recuerda activar las compras por internet
                            con tu banco</p>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <script src="<?php echo $client->getClientEndpoint(); ?>/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"
        kr-public-key="<?php echo $client->getPublicKey(); ?>" kr-post-url-success="{{ route('orders.pay', $order) }}"></script>


</div>

{{-- Ejemplo con paypal --}}
{{-- <section>
    <div>
    
        <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-5 gap-6 container py-8">
    
            <div class="order-2 lg:order-1 xl:col-span-3">
                <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
                    <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                        Orden-{{ $order->id }}</p>
                </div>
    
                <div class="bg-white rounded-lg shadow-lg p-6 mb-6">
                    <div class="grid grid-cols-2 gap-6 text-gray-700">
                        <div>
                            <p class="text-lg font-semibold uppercase">Envío</p>
    
                            @if ($order->envio_type == 1)
                                <p class="text-sm">Los productos deben ser recogidos en tienda</p>
                                <p class="text-sm">Calle falsa 123</p>
                            @else
                                <p class="text-sm">Los productos Serán enviados a:</p>
                                <p class="text-sm">{{ $envio->address }}</p>
                                <p>{{ $envio->department }} - {{ $envio->city }} - {{ $envio->district }}
                                </p>
                            @endif
    
    
                        </div>
    
                        <div>
                            <p class="text-lg font-semibold uppercase">Datos de contacto</p>
    
                            <p class="text-sm">Persona que recibirá el producto: {{ $order->contact }}</p>
                            <p class="text-sm">Teléfono de contacto: {{ $order->phone }}</p>
                        </div>
                    </div>
                </div>
    
                <div class="bg-white rounded-lg shadow-lg p-6 text-gray-700 mb-6">
                    <p class="text-xl font-semibold mb-4">Resumen</p>
    
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Precio</th>
                                <th>Cant</th>
                                <th>Total</th>
                            </tr>
                        </thead>
    
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($items as $item)
                                <tr>
                                    <td>
                                        <div class="flex">
                                            <img class="h-15 w-20 object-cover mr-4" src="{{ $item->options->image }}"
                                                alt="">
                                            <article>
                                                <h1 class="font-bold">{{ $item->name }}</h1>
                                                <div class="flex text-xs">
    
                                                    @isset($item->options->color)
                                                        Color: {{ __($item->options->color) }}
                                                    @endisset
    
                                                    @isset($item->options->size)
                                                        - {{ $item->options->size }}
                                                    @endisset
                                                </div>
                                            </article>
                                        </div>
                                    </td>
    
                                    <td class="text-center">
                                        S/  {{ $item->price }} 
                                    </td>
    
                                    <td class="text-center">
                                        {{ $item->qty }}
                                    </td>
    
                                    <td class="text-center">
                                        S/ {{ $item->price * $item->qty }} 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
    
    
    
            </div>
    
            <div class="order-1 lg:order-2 xl:col-span-2">
                <div class="bg-white rounded-lg shadow-lg px-6 pt-6">
                    <div class="flex justify-between items-center mb-4">
                        <img class="h-8" src="{{ asset('img/MC_VI_DI_2-1.jpg') }}" alt="">
                        <div class="text-gray-700">
                            <p class="text-sm font-semibold">
                                Subtotal: S/ {{ $order->total - $order->shipping_cost }} 
                            </p>
                            <p class="text-sm font-semibold">
                                Envío: S/ {{ $order->shipping_cost }} 
                            </p>
                            <p class="text-lg font-semibold uppercase">
                                Total: S/ {{ $order->total }} 
                            </p>
    
                            <div class="cho-container">
    
                            </div>
                        </div>
                    </div>
    
    
                    <div id="paypal-button-container"></div>
    
                </div>
            </div>
    
        </div>
    
        @push('script')
            
        
    
            <script src="https://www.paypal.com/sdk/js?client-id={{ config('services.paypal.client_id') }}">
            
    
            </script>
    
    
            <script>
                paypal.Buttons({
                    createOrder: function(data, actions) {
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    value: "{{ $order->total }}"
                                }
                            }]
                        });
                    },
                    onApprove: function(data, actions) {
                        return actions.order.capture().then(function(details) {
    
                            Livewire.emit('payOrder');
    
                                   });
                    }
                }).render('#paypal-button-container'); 
    
            </script>
    
        @endpush
    </div>
</section> --}}
