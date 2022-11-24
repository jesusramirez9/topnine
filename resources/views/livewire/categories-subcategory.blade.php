<div>
    <div class="">
        <div class="grid grid-cols-12  relative rounded-lg">
            <div class="col-span-3 ">
                <div x-on:click.away="close()" class="grid grid-cols-1 h-96  ">
                    <ul class="bg-white rounded-lg">
                        <div class="flex pl-6 items-center py-2 bg-gray-100 rounded-t-lg border-t-2 border-l-2 border-r-2">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <span class="text-sm hidden md:block">Categorías</span>
                        </div>
                        @foreach ($categories as $category)
                            <li
                                class="navigation-link text-trueGray-700 hover:font-bold hover:bg-gray-200 hover:text-black">
                                <a href="{{ route('categories.show', $category) }}"
                                    class="py-2 px-4 text-sm flex items-center">
                                   <span class="flex justify-center w-9">
                                            {!!$category->icon!!}
                                        </span> 
                                    <span class="flex justify-center w-1 bg-orange-500 h-4 mr-2">
        
                                    </span>
                                    {{ $category->name }}
                                </a>
                                <hr>
                                <div class="navigation-submenu bg-white absolute w-3/4 h-96 top-0 right-0 hidden rounded-lg shadow-lg">
                                    <x-navigation-subcategories :category="$category" />
                                </div>
        
                            </li>
                        @endforeach
                    </ul>
                    <div class="col-span-1 bg-gray-100 hidden rounded-lg">
                        <x-navigation-subcategories :category="$categories->first()" />
                    </div>
                </div>
            </div>
            <div class="col-span-9  rounded-lg px-4">
                <div class="flex space-x-4 lg:space-x-12  justify-center bg-white py-3 rounded-lg">
                    <div>
                        <p>Pagos seguros y fiables</p>
                    </div>
                    <div>
                        <p>Garantía de reembolso</p>
                    </div>
                    <div>
                        <p>Servicio de atención al cliente 24/7</p>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4 mt-4">
                    <div class="col-span-4">
                        <div class="bg-red-400 rounded-lg px-2 py-3">
                            <p>¡Bienvenidos a Topnine!</p>
                            <p>Promociones y ofertas</p>
                        </div>
                    </div>
                    <div class="col-span-8">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
