<x-app-layout>


    @push('link')
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    @endpush
    <div class="bg-gray-100">
        <div>
            @livewire('navigation-responsive')
        </div>

        <div class="container pt-8 md:hidden"> 
            <div class="rounded-lg w-full">
                <div class="glider-contain ">
                    <div class="sliderm">
                        @foreach ($banners as $banner)
                        <div class="overflow-hidden rounded-lg">
                            <figure class="">
                                <img class="lg:h-20 xl:h-36 w-full object-cover object-center rounded-lg"
                                    src="{{Storage::url($banner->image)}}">
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
                    <div class="bgpromo8">
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
                    <button aria-label="Previous" class="hidden md:block glider-prev8 slidehomeprev absolute">
                        <span class="text-4xl">«</span>
                    </button>
                    <button aria-label="Next" class="hidden md:block glider-next8 slidehomenext absolute">
                        <span class="text-4xl">»</span>
                    </button>
                </div>
            </div>
        </div>


        <div class="container pb-8 d-none md:block">
            @livewire('categories-subcategory')
        </div>

        <div class="container py-8 ">
            @foreach ($categories as $category)
                @if ($category->products->count() > 0)
                    <section class="mb-6">
                        <div class="flex items-center mb-2">
                            <h1 class="text-lg uppercase font-semibold text-gray-700">
                                {{ $category->name }}
                            </h1>
                            <a class="text-orange-500 ml-2 font-semibold hover:text-orange-400 hover:underline"
                                href="{{ route('categories.show', $category) }}">Ver más</a>
                        </div>


                        @livewire('category-products', ['category' => $category])
                    </section>
                @else
                @endif
            @endforeach
        </div>
    </div>
     <div>
    @livewire('show-flayer')
</div>

    @push('script')
        <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
        
        <script>
            $(document).ready(function() {
                $('.sliderjss').slick({
                    autoplay: true,
                    infinite: true,
                    speed: 300,
                    slidesToShow: 1,
                });
            });
        </script>
        <script>
            
        </script>
        <script>
            livewire.on('glider', function(id) {

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToScroll: 1,
                    slidesToShow: 1,
             //       dots: '.glider-' + id + '~ .dots',
                    dots: false,
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [
                        {
                            breakpoint: 375,
                            settings: {
                                slidesToScroll: 3,
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 640,
                            settings: {
                                slidesToScroll: 2.5,
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 768,
                            draggable: true,
                            settings: {
                                slidesToScroll: 3.5,
                                slidesToShow: 3,
                            }
                        },
                        {
                            breakpoint: 1024,
                            settings: {
                                slidesToScroll: 4.5,
                                slidesToShow: 4,
                            }
                        },
                        {
                            breakpoint: 1280,
                            settings: {
                                slidesToScroll: 5,
                                slidesToShow: 6,
                            }
                        }

                    ]
                });

            });
        </script>
        <script>
            new Glider(document.querySelector('.bgpromo8'), {
                slidesToShow: 3,
                slidesToScroll: 1,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev8',
                    next: '.glider-next8'
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
                                prev: '.glider-prev8',
                                next: '.glider-next8'
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
                                prev: '.glider-prev8',
                                next: '.glider-next8'
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
                                prev: '.glider-prev8',
                                next: '.glider-next8'
                            },

                        }
                    },

                ]
            });
        </script>
    @endpush

</x-app-layout>
