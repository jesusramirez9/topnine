<div class=" bg-gray-100 ">
    <div class="container mt-14 py-8">

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 justify-center ">
            <div class="col-span-3">

                <x-table-responsive>
                    <div class="px-6 pb-4  lg:py-4  text-center md:text-left md:mt-0 bg-white">
                        <h1 class="text-xl lg:text-2xl font-bold ">Mi carrito de compras</h1>
                    </div>

                    @if (Cart::count())
                        <table class="min-w-full  divide-y ">
                            <thead class="bg-gray-50 ">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                                        Producto
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                                        Precio
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                                        Cantidad
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-bold  uppercase tracking-wider">
                                        Subtotal
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white ">
                                @foreach (Cart::content() as $item)
                                    <tr class="border-b-2 border-gray-500 border-opacity-20">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full object-cover object-center"
                                                        src="{{ $item->options->image }}" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm  colorbroywm font-bold">
                                                        {{ $item->name }}
                                                    </div>
                                                    <div class="text-sm text-gray-500">
                                                        @if ($item->options->color)
                                                            <span class="capitalize">
                                                                - Color: {{ __($item->options->color) }}
                                                            </span>
                                                        @endif
                                                        @if ($item->options->size)
                                                            <span class="mx-1"> - </span>
                                                            <span>Medida: {{ $item->options->size }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">

                                            <div class="text-sm colorbroywm font-bold"><span>S/
                                                    {{ $item->price }}</span>
                                                <a class="ml-6 cursor-pointer hover:text-red-600"
                                                    wire:click="delete('{{ $item->rowId }}')"
                                                    wire:loading.class="text-red-600 opacity-600"
                                                    wire:target="delete('{{ $item->rowId }}')">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm colorbroywm font-bold">
                                                @if ($item->options->size)
                                                    @livewire('update-cart-size', ['rowId' => $item->rowId], key($item->rowId))
                                                @elseif($item->options->color)
                                                    @livewire('update-cart-color', ['rowId' => $item->rowId], key($item->rowId))
                                                @else
                                                    @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))
                                                @endif
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm colorbroywm font-bold">
                                            <div class="text-sm  colorbroywm font-bold">
                                                S/ {{ $item->price * $item->qty }}
                                            </div>

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="px-6 py-4 bg-white">
                            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block" wire:click="destroy">
                                <i class="fas fa-trash"></i>
                                Borrar todo
                            </a>
                        </div>
                    @else
                        <div class="flex flex-col items-center mt-2 md:mt-0 py-4 bg-white">
                            <x-cart></x-cart>
                            <p class="text-sm lg:text-lg text-gray-700 mt-4">No tienes productos por comprar</p>
                            <x-button-enlace href="{{ route('home') }}"
                                class="mt-4 bg_top_naranja px-16">
                                Ir a inicio
                            </x-button-enlace>
                        </div>

                    @endif
                </x-table-responsive>
                <!-- This example requires Tailwind CSS v2.0+ -->
            </div>
            <div class="col-span-1">
                @if (Cart::count())
                    <div class=" rounded-lg shadow-lg px-6 py-4  bg-white">
                        <div class=" items-center">
                            <div>
                                <h1 class="font-bold text-xl">Resumen de compra</h1>
                                <hr class="bg-gray-100 my-3">
                                <div class="flex justify-between items-center">
                                    <p class="text-sm font-semibold">Total a pagar</p>
                                    <p class="text-gray-700 font-medium">
                                    
                                        S/ {{ Cart::subTotal() }}
                                    </p>
                                </div>
                              
                            </div>
                            <hr class="bg-gray-100 my-3">
                            <div>
                                <x-button-enlace href="{{ route('orders.create') }}" class="bg_top_naranja w-full">
                                    Ir a comprar
                                </x-button-enlace>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </div>

        @livewire('products-all')
    </div>
</div>
