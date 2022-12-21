<div>
    <ul class="text-gray-500">
        {{-- @forelse (Cart::content() as $item)
            <div class="bg-center bg-cover h-96 w-full object-center"
                style="background-image: url('{{ $item->options->image }}')">
            </div>
            <li class="flex p-2 border-b border-gray-200">
                <article class="flex-1">
                    <h1 class="font-bold my-2">{{ $item->name }}</h1>
                    <div class="flex">
                        <p class="font-bold">Cantidad: <span class="font-normal">{{ $item->qty }}
                                @if ($item->qty == 1)
                                    unidad
                                @else
                                    unidades
                                @endif
                            </span> </p>
                        @isset($item->options['color'])
                            <p class="mx-2">- Color: {{ __($item->options['color']) }}</p>
                        @endisset
                        @isset($item->options['size'])
                            <p> Talla: - {{ $item->options['size'] }}</p>
                        @endisset
                    </div>
                    <p class="font-bold">Precio x unidad: <span class="font-normal">S/ {{ $item->price }}</span> </p>
                </article>
            </li>
        @empty
            <li class="py-6 px-4">
                <p class="text-center text-gray-700">
                    No tiene ningun producto agregado
                </p>
            </li>
        @endforelse --}}
        <x-table-responsive>
            
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
                                            <img class="h-10 w-10 object-cover object-center"
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
                                                    <span>Talla: {{ $item->options->size }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    <div class="text-sm colorbroywm font-bold"><span>S/
                                            {{ $item->price }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm colorbroywm font-bold">
                                        {{$item->qty}}
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
            @else
                <div class="flex flex-col items-center mt-2 md:mt-0 py-4 bg-white">
                    <x-cart></x-cart>
                    <p class="text-sm lg:text-lg text-gray-700 mt-4">No tienes productos</p>
                    <x-button-enlace href="/"
                        class="mt-4 bg_top_naranja px-16">
                        Nuestros productos
                    </x-button-enlace>
                </div>

            @endif
        </x-table-responsive>
    </ul>
    @if (Cart::count())
        <div class="py-2 px-3">
            <p class="text-lg text-gray-700 mt-2 mb-3"><span class="font-bold">Total: </span> S/
                {{ Cart::subtotal() }} Nuevos soles</p>

            <x-button-enlace href="{{ route('shopping-cart') }}" color="orange" class="w-full">Procesar compra
            </x-button-enlace>
            <a class="text-sm cursor-pointer hover:underline mt-3 inline-block text-red-600 hover:text-red-800"
                wire:click="destroy">
                <i class="fas fa-trash"></i>
                Borrar la compra
            </a>
        </div>
    @endif
</div>
