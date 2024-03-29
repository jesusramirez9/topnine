<div class="bg-gray-100">
    <div class="my-6 md:my-10">
        <p class="text-center font-semibold tracking-wider text-lg lg:text-2xl">
            Presentaciones exclusivas
        </p>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6 xl:gap-8">
        <div class="text-center btn_filter_rp">
            <button class="green_top hover:green_top px-3 py-1 rounded text-white show-modal">
                Filtrar
            </button>
        </div>
        <aside class="category_filter_web rounded-lg">
            <div class="bg-white p-4">
                <p class="font-bold text-xl ">Filtros</p>
                <hr class="bg-gray-400 my-1 ">
                <div id="container-main mt-4 ">
                    <div class="accordion-container">
                        <a class="accordion-titulo open cursor-pointer">Categorías<span class="toggle-icon"></span></a>
                        <div class="accordion-content block">
                            <ul class="divide-y divide-gray-200">
                                @if ($categories->count() > 0)
                                    @foreach ($categories as $categoryt)
                                        @if ($categoryt->products->count() > 0)
                                            <li class="divide-x divide-gray-200 py-1 pl-3 text-sm">
                                                <a href="{{ route('categories.show', $categoryt) }}"
                                                    class="cursor-pointer hover:text-orange-500 capitalize {{ $category->id == $categoryt->id ? 'text-orange-500  font-semibold' : '' }}">
                                                    {{ $categoryt->name }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                @else
                                @endif
                            </ul>
                        </div>
                    </div>
                    <hr class="pb-6">
                    <div class="accordion-container">
                        <a class="accordion-titulo open">Subcategorías <span class="toggle-icon"></span></a>
                        <div class="accordion-content block">
                            <ul class="divide-y divide-gray-200">
                                @foreach ($category->subcategories as $subcategory)
                                    <li class="py-2  rronmaa font-semibold pl-3 text-sm ">
                                        <a class="cursor-pointer hover:text-orange-500 capitalize {{ $subcategoria == $subcategory->slug ? 'text-orange-500  font-semibold' : '' }}"
                                            wire:click="$set('subcategoria', '{{ $subcategory->slug }}')">
                                            {{ $subcategory->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <hr class="pb-6">
                    <div class="accordion-container">
                        <a class="accordion-titulo open">Precio<span class="toggle-icon"></span></a>
                        <div class="accordion-content block">
                            <ul class="divide-y divide-gray-200">
                                @foreach ($precio_product as $precioitem)
                                    <li class="py-2 text-sm rronmaa font-semibold pl-3">
                                        <a class="cursor-pointer hover:text-orange-500 {{ $precio == $precioitem['id'] ? 'text-orange-500 font-semibold' : '' }} "
                                            wire:click="$set('precio','{{ $precioitem['id'] }}')">{{ $precioitem['label'] }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @if ($category->subcategories->max('color') > 0)
                        <div class="accordion-container">
                            <a class="accordion-titulo open">Colores<span class="toggle-icon"></span></a>
                            <div class="accordion-content block">
                                {{-- <ul class="grid grid-cols-6 md:grid-cols-4 lg:grid-cols-4 gap-2 ">
                                @foreach ($colors_product as $coloritem)
                                    <li class=" py-2 text-sm rronmaa font-semibold">
                                        <a class="cursor-pointer  hover:text-orange-500 capitalize {{ $color == $coloritem->id ? 'text-orange-500 font-semibold' : '' }} "
                                            wire:click="$set('color','{{ $coloritem->id }}')">
                                            <span class="ml-2 text-gray-700 capitalize bg_clds" style="background-color:{{$coloritem->name}} "></span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul> --}}
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($colors_product as $coloritem)
                                        <li class="py-2 text-sm rronmaa font-semibold pl-3">
                                            <a class="cursor-pointer hover:text-orange-500 capitalize {{ $color == $coloritem->id ? 'text-orange-500 font-semibold' : '' }} "
                                                wire:click="$set('color','{{ $coloritem->id }}')">{{ $coloritem->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if ($category->subcategories->max('size') > 0)
                        <div class="accordion-container">
                            <a class="accordion-titulo open">Tallas<span class="toggle-icon"></span></a>
                            <div class="accordion-content block">
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($talla_product as $itemtalla)
                                        <li class="py-2 text-sm rronmaa font-semibold pl-3">
                                            <a class="cursor-pointer hover:text-orange-500 capitalize {{ $talla == $itemtalla->name ? 'text-orange-500 font-semibold' : '' }} "
                                                wire:click="$set('talla','{{ $itemtalla->name }}')">{{ $itemtalla->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </div>

                <x-jet-button class="mt-4 w-full justify-center" wire:click="limpiar">
                    Eliminar filtros
                </x-jet-button>
            </div>
        </aside>

        <div class="md:col-span-2 lg:col-span-4">
            @if ($view == 'grid')
                <ul class="grid grid-cols-2 gap-3 md:grid-cols-3 lg:grid-cols-4  md:gap-6 mx-6 md:mx-0">
                    @forelse ($products as $product)
                        <li class="  ">
                            <article class=" overflow-hidden bg-white rounded-xl zoomcatalg ">

                                <a href="{{ route('products.show', $product) }}">
                                    <figure class="relative">
                                        <div class="absolute z-30 mt-4 ml-4">
                                            @if ($product->offer == 0)
                                            @else
                                                <div class="bg-red-600 text-white px-1 py-1 w-12 rounded-lg z-20">
                                                    <p class="text-center text-xs font-semibold">
                                                        -
                                                        {{ intval((($product->offer - $product->price) / $product->offer) * 100) }}
                                                        %
                                                    </p>
                                                </div>
                                            @endif
                                        </div>
                                        @if ($product->images->count())
                                            <img class=" w-full object-cover object-center scrollflow -slide-bottom -opacity"
                                                src="{{ Storage::url($product->images->first()->url) }}"
                                                alt="">
                                        @else
                                            <img class=" w-full object-cover object-center"
                                                src="https://images.pexels.com/photos/5082560/pexels-photo-5082560.jpeg?cs=srgb&dl=pexels-cottonbro-5082560.jpg&fm=jpg"
                                                alt="">
                                        @endif

                                    </figure>
                                    <div class="py-2 px-2">
                                        {{-- <p class="text-gray-400 font-medium text-xs  uppercase">
                                            {{ $product->subcategory->name }}</p> --}}

                                        <h1 class="text-xs text-left font-medium scrollflow -slide-bottom -opacity truncate">
                                            {{ $product->name }}assssssssssssssssssssssssssssssss
                                        </h1>
                                        <p class="font-bold text-left  scrollflow -slide-bottom -opacity">
                                            PEN s/ {{ $product->price }}</p>

                                        @if ($product->offer != 0)
                                            <p class="text-xs text-gray-400">Precio normal: <span
                                                    class=" text-gray-400 line-through text-center">s/
                                                    {{ $product->offer }}
                                                </span></p>
                                        @else
                                        @endif
                                        <div class="flex justify-center items-center py-4">
                                            <button
                                                class="text-white w-full font-medium text-xs lg:text-base bg_top_naranja hover:bg-orange-500 px-2 lg:px-5 py-2 rounded-sm"><i
                                                    class="fa-solid text-white fa-magnifying-glass mr-2"></i>Ver
                                                producto</button>
                                        </div>


                                    </div>
                                </a>
                            </article>
                        </li>
                    @empty

                        <li class="md:col-span-2 lg:col-span-4">
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                                role="alert">
                                <strong class="font-bold">Upss!</strong>
                                <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                            </div>
                        </li>
                    @endforelse
                </ul>
            @else
                <ul>
                    @forelse ($products as $product)
                        <x-product-list :product="$product" />
                    @empty
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <strong class="font-bold">Upss!</strong>
                            <span class="block sm:inline">No existe ningún producto con ese filtro.</span>
                        </div>
                    @endforelse
                </ul>
            @endif

            <div class="mt-4 links_mds">
                {{ $products->links() }}
            </div>
        </div>
    </div>

    <div
        class="modal h-screen w-full  z-40 fixed left-0 top-0 justify-center items-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded shadow-lg tamaniomodal w-1/2">
            <div class="border-b px-4 py-2 flex justify-between items-center">
                <h3 class="font-semibold text-lg">Filtros</h3>
                <button class="text-black close-modal">&cross;</button>
            </div>
            <div class="p-3 body_modal ">
                <aside class="category_filter_rp">
                    <div id="container-main">
                        <div class="accordion-container">
                            <a class="accordion-titulo open">Categorías<span class="toggle-icon"></span></a>
                            <div class="accordion-content block">
                                <ul class="divide-y divide-gray-200">
                                    @if ($categories->count() > 0)
                                        @foreach ($categories as $categoryt)
                                            @if ($categoryt->products->count() > 0)
                                                <li class="divide-x divide-gray-200 py-1 pl-3 text-sm">
                                                    <a href="{{ route('categories.show', $categoryt) }}"
                                                        class="cursor-pointer hover:text-orange-500 capitalize {{ $category->id == $categoryt->id ? 'text-orange-500  font-semibold' : '' }}">
                                                        {{ $categoryt->name }}
                                                    </a>
                                                </li>
                                            @endif
                                        @endforeach
                                    @else
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-container">
                            <a class="accordion-titulo open">Subcategorías <span class="toggle-icon"></span></a>
                            <div class="accordion-content block">
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($category->subcategories as $subcategory)
                                        <li class="py-2  rronmaa font-semibold pl-3 text-sm ">
                                            <a class="cursor-pointer hover:text-orange-500 capitalize {{ $subcategoria == $subcategory->slug ? 'text-orange-500  font-semibold' : '' }}"
                                                wire:click="$set('subcategoria', '{{ $subcategory->slug }}')">
                                                {{ $subcategory->name }}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="accordion-container">
                            <a class="accordion-titulo open">Precio<span class="toggle-icon"></span></a>
                            <div class="accordion-content block">
                                <ul class="divide-y divide-gray-200">
                                    @foreach ($precio_product as $precioitem)
                                        <li class="py-2 text-sm rronmaa font-semibold pl-3">
                                            <a class="cursor-pointer hover:text-orange-500 {{ $precio == $precioitem['id'] ? 'text-orange-500 font-semibold' : '' }} "
                                                wire:click="$set('precio','{{ $precioitem['id'] }}')">{{ $precioitem['label'] }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @if ($category->subcategories->max('color') > 0)
                            <div class="accordion-container">
                                <a class="accordion-titulo open">Colores<span class="toggle-icon"></span></a>
                                <div class="accordion-content block">
                                    <ul class="divide-y divide-gray-200">
                                        @foreach ($colors_product as $coloritem)
                                            <li class="py-2 text-sm rronmaa font-semibold pl-3">
                                                <a class="cursor-pointer hover:text-orange-500 capitalize {{ $color == $coloritem->id ? 'text-orange-500 font-semibold' : '' }} "
                                                    wire:click="$set('color','{{ $coloritem->id }}')">{{ $coloritem->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        @if ($category->subcategories->max('size') > 0)
                            <div class="accordion-container">
                                <a class="accordion-titulo open">Medidas<span class="toggle-icon"></span></a>
                                <div class="accordion-content block">
                                    <ul class="divide-y divide-gray-200">
                                        @foreach ($talla_product as $itemtalla)
                                            <li class="py-2 text-sm rronmaa font-semibold pl-3">
                                                <a class="cursor-pointer hover:text-orange-500 capitalize {{ $talla == $itemtalla->name ? 'text-orange-500 font-semibold' : '' }} "
                                                    wire:click="$set('talla','{{ $itemtalla->name }}')">{{ $itemtalla->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </aside>
            </div>
            <div class="flex justify-end items-center w-100 border-t p-3">
                <x-jet-button class="mr-6" wire:click="limpiar">
                    Eliminar filtros
                </x-jet-button>
                <button
                    class="bg_top_naranja hover:bg-orange-700 px-3 py-1 rounded text-white mr-1 close-modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@push('script')
    <script>
        const modal = document.querySelector('.modal');

        const showModal = document.querySelector('.show-modal');
        const closeModal = document.querySelectorAll('.close-modal');

        showModal.addEventListener('click', function() {
            modal.classList.remove('hidden')
        });

        closeModal.forEach(close => {
            close.addEventListener('click', function() {
                modal.classList.add('hidden')
            });
        });

        $(".accordion-titulo").click(function() {

            var contenido = $(this).next(".accordion-content");

            if (contenido.css("display") == "none") { //open		
                contenido.slideDown(250);
                $(this).addClass("open");
            } else { //close		
                contenido.slideUp(250);
                $(this).removeClass("open");
            }

        });
    </script>
@endpush
