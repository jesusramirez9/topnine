<div>
    @push('link')
        <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}" />
    @endpush
    <div class="mt-8">
        <div class="grid grid-cols-12  relative rounded-lg">
            <div class="col-span-3 ">
                <div x-on:click.away="close()" class="grid grid-cols-1  h-full ">
                    <ul class="bg-white rounded-lg">
                        <div
                            class="flex pl-6 items-center py-2 bg-gray-100 rounded-t-lg border-t-2 border-l-2 border-r-2">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                            <span class="text-sm hidden md:block">Categorías</span>
                        </div>
                        @if ($categories->count() > 0)
                        @foreach ($categories as $category)
                        @if ($category->products->count() > 0) 
                            <li
                                class="navigation-link text-trueGray-700 hover:font-bold hover:bg-gray-200 hover:text-black">
                                <a href="{{ route('categories.show', $category) }}"
                                    class="py-2 px-4 text-xs xl:text-sm flex items-center">
                                    <span class="flex justify-center w-9">
                                        {!! $category->icon !!}
                                    </span>
                                    <span class="flex justify-center w-1 bg-orange-500 h-4 mr-2">

                                    </span>
                                    {{ $category->name }}
                                </a>
                                <hr>
                                <div
                                    class="navigation-submenu z-10 bg-white absolute w-3/4 h-96 top-0 right-0 hidden rounded-lg shadow-lg">
                                    <x-navigation-subcategories :category="$category" />
                                </div>

                            </li>
                            @endif   
                        @endforeach
                        @endif
                    </ul>
                    <div class="col-span-1 bg-gray-100 hidden rounded-lg">
                        <x-navigation-subcategories :category="$categories->first()" />
                    </div>
                </div>
            </div>
            <div class="col-span-9  rounded-lg px-4">
                <div class="flex space-x-4 lg:space-x-12  justify-center bg-white py-3 rounded-lg text-xs xl:text-base">
                    <div>
                        <p><i class="fa-sharp fa-solid fa-lock mx-2"></i>Pagos seguros y fiables</p>
                    </div>
                    <div>
                        <p><i class="fa-sharp fa-solid fa-lock mx-2"></i>Garantía de productos</p>
                    </div>
                    <div>
                        <p><i class="fa-sharp fa-solid fa-lock mx-2"></i>Servicio de atención al cliente 24/7</p>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4 mt-4">
                    <div class="col-span-4">
                        <div class=" rounded-lg px-4 py-6 bg-cover bg-center h-full"
                            style="background-image: url({{ asset('img/fondotop.jpg') }})">
                            <div class="py-6 text-xs xl:text-lg text-white font-medium">

                              {{--  <p>¡Bienvenidos a Topnine!</p>
                                <p>Promociones y ofertas</p>--}}
                                <br>
                                <br>
                            </div>
                            <div class="rounded-xl">
                                <div class="promocion rounded-xl">
                                    <div class="rounded-lg ">
                                        <div class="">
                                            <div class="glider-contain ">
                                                
                                            </div>
                                        </div>
                                        <div>
                                            <div class="glider-contain ">
                                                <div class="bgpromo2">
                                                    {{-- @foreach ($subcategories as $subcategory) --}}
                                                        @foreach ($productsSection1 as $product)
                                                            <div class="mx-2  overflow-hidden  gliderslide1  ">
                                                                <figure class="">
                
                                                                    @if ($product->images->count())
                                                                        <img class="h-36 w-full object-cover object-center scrollflow -slide-bottom -opacity"
                                                                            src="{{ Storage::url($product->images->first()->url) }}"
                                                                            alt="">
                                                                    @else
                                                                        <img class="h-36 w-full object-cover object-center"
                                                                            src="https://images.pexels.com/photos/5082560/pexels-photo-5082560.jpeg?cs=srgb&dl=pexels-cottonbro-5082560.jpg&fm=jpg"
                                                                            alt="">
                                                                    @endif
                
                                                                </figure>
                                                                <a href="{{ route('products.show', $product) }}">
                                                                    <div class="py-2 px-2 ">
                                                                        {{-- <h1 class="text-normal font-medium  py-1 scrollflow -slide-bottom -opacity">
                                                                            {{ Str::limit($product->name, 40, '...') }}
                                                                        </h1> --}}
                                                                        <div class="items-center">
                                                                            @if ($product->offer != 0)
                                                                                
                                                                            @else
                                                                            @endif
                                                                            <p
                                                                                class="font-bold text-sm scrollflow -slide-bottom -opacity text-white">
                                                                            PEN S/ {{ $product->price }}</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    {{-- @endforeach --}}
                                                </div>
                                                <button aria-label="Previous" class="hidden md:block glider-prev1 slidehomeprev absolute">
                                                    <span class="text-4xl">«</span>
                                                </button>
                                                <button aria-label="Next" class="hidden md:block glider-next1 slidehomenext absolute">
                                                    <span class="text-4xl">»</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <div class="glider-contain ">
                                                <div class="bgpromo3">
                                                    {{-- @foreach ($subcategories as $subcategory) --}}
                                                        @foreach ($productsSection2 as $product)
                                                            <div class="mx-2  overflow-hidden  gliderslide1 ">
                                                                <figure class="">
                
                                                                    @if ($product->images->count())
                                                                        <img class="h-36 w-full object-cover object-center scrollflow -slide-bottom -opacity"
                                                                            src="{{ Storage::url($product->images->first()->url) }}"
                                                                            alt="">
                                                                    @else
                                                                        <img class="h-36 w-full object-cover object-center"
                                                                            src="https://images.pexels.com/photos/5082560/pexels-photo-5082560.jpeg?cs=srgb&dl=pexels-cottonbro-5082560.jpg&fm=jpg"
                                                                            alt="">
                                                                    @endif
                
                                                                </figure>
                                                                <a href="{{ route('products.show', $product) }}">
                                                                    <div class="py-2 px-2 ">
                                                                        {{-- <h1 class="text-normal font-medium  py-1 scrollflow -slide-bottom -opacity">
                                                                            {{ Str::limit($product->name, 40, '...') }}
                                                                        </h1> --}}
                                                                        <div class="items-center">
                                                                            @if ($product->offer != 0)
                                                                               
                                                                            @else
                                                                            @endif
                                                                            <p
                                                                                class="font-bold text-sm scrollflow -slide-bottom -opacity text-white">
                                                                               PEN S/ {{ $product->price }}</p>
                                                                        </div>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    {{-- @endforeach --}}
                                                </div>
                                                <button aria-label="Previous" class="hidden md:block glider-prev2 slidehomeprev absolute">
                                                    <span class="text-4xl">«</span>
                                                </button>
                                                <button aria-label="Next" class="hidden md:block glider-next2 slidehomenext absolute">
                                                    <span class="text-4xl">»</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-8">
                        <div class="rounded-lg w-full">
                            <div class="glider-contain ">
                                <div class="sliderm">
                                    @foreach ($banners as $banner)
                                        <div class="overflow-hidden rounded-lg">
                                            <figure class="">
                                                <img class="lg:h-44 xl:h-52 w-full object-cover object-center rounded-lg"
                                                    src="{{ Storage::url($banner->image) }}">
                                            </figure>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="bg-white mt-2 rounded-lg py-4  w-full">
                            <p class="px-4  text-black font-extrabold">Super <span class="text-red-400 ">Ofertas</span>
                            </p>
                            <p class="px-4 pb-1 text-sm text-gra">Productos top a precios increibles</p>
                            <div class="glider-contain">
                                <div class="bgpromo">
                                    {{-- @foreach ($subcategories as $subcategory) --}}
                                        @foreach ($offerProducts as $product)
                                            <div class="mx-4 border-2 overflow-hidden border-white  bg-white">
                                                <figure class="py-2 px-2 ">

                                                    @if ($product->images->count())
                                                        <img class="h-36 w-full object-cover object-center scrollflow -slide-bottom -opacity"
                                                            src="{{ Storage::url($product->images->first()->url) }}"
                                                            alt="">
                                                    @else
                                                        <img class="h-36 w-full object-cover object-center"
                                                            src="https://images.pexels.com/photos/5082560/pexels-photo-5082560.jpeg?cs=srgb&dl=pexels-cottonbro-5082560.jpg&fm=jpg"
                                                            alt="">
                                                    @endif

                                                </figure>
                                                <a href="{{ route('products.show', $product) }}">
                                                    <div class="py-2 px-2 ">
                                                        {{-- <h1 class="text-normal font-medium  py-1 scrollflow -slide-bottom -opacity">
                                                            {{ Str::limit($product->name, 40, '...') }}
                                                        </h1> --}}
                                                        <div class="items-center">
                                                            @if ($product->offer != 0)
                                                                <p class="text-xs text-gray-400">Precio normal: <span
                                                                        class=" text-gray-400 line-through">s/{{ $product->offer }}
                                                                    </span></p>
                                                            @else
                                                            @endif
                                                            <p
                                                                class="font-bold text-sm scrollflow -slide-bottom -opacity">
                                                                S/ {{ $product->price }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        @endforeach
                                    {{-- @endforeach --}}
                                </div>
                                <button aria-label="Previous" class="hidden md:block glider-prev slidehomeprev absolute">
                                    <span class="text-4xl">«</span>
                                </button>
                                <button aria-label="Next" class="hidden md:block glider-next slidehomenext absolute">
                                    <span class="text-4xl">»</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script type="text/javascript" src="{{ asset('js/slick.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('.slide_rlg').slick();
            });
            $('.promocion').slick({
                fade: true,
            });
            $('.sliderm').slick({
                fade: true,
            });
            $('.sliderm1').slick({
                fade: true,
                slidesToShow: 2,
                slidesToScroll: 1

            });
        </script>
        <script>
            new Glider(document.querySelector('.bgpromo'), {
                slidesToShow: 3,
                slidesToScroll: 1,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },
                responsive: [
                    {
                        // screens greater than >= 1024px
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            itemWidth: 150,
                            duration: 1.5,
                            arrows: {
                                prev: '.glider-prev',
                                next: '.glider-next'
                            },

                        }
                    },
                    {
                        // screens greater than >= 1024px
                        breakpoint: 1250,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            itemWidth: 150,
                            duration: 1.5,
                            arrows: {
                                prev: '.glider-prev',
                                next: '.glider-next'
                            },

                        }
                    },
                    {
                        // screens greater than >= 1024px
                        breakpoint: 400,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            itemWidth: 150,
                            duration: 1.5,
                            arrows: {
                                prev: '.glider-prev',
                                next: '.glider-next'
                            },

                        }
                    },

                ]
            });
        </script>
        <script>
            new Glider(document.querySelector('.bgpromo2'), {
                slidesToShow: 2,
                slidesToScroll: 2,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev1',
                    next: '.glider-next1'
                },
                responsive: [


                    {
                        // screens greater than >= 1024px
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            duration: 1.5,
                            itemWidth: 115,
                            infinity:true,
                            arrows: {
                                prev: '.glider-prev1',
                                next: '.glider-next1'
                            },

                        }
                    }

                ]
            });
        </script>
         <script>
            new Glider(document.querySelector('.bgpromo3'), {
                slidesToShow: 2,
                slidesToScroll: 2,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev1',
                    next: '.glider-next1'
                },
                responsive: [


                    {
                        // screens greater than >= 1024px
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            duration: 1.5,
                            itemWidth: 115,
                            infinity:true,
                            arrows: {
                                prev: '.glider-prev2',
                                next: '.glider-next2'
                            },

                        }
                    }

                ]
            });
        </script>
    @endpush

</div>
