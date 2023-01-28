<div>
    @push('link')
        
    <script src="{{ asset('vendor/flexSlider/jquery.flexslider-min.js') }}"></script>
    @endpush
    <div>
        <div class=" mt-14">
            <h1 class="font-medium text-xl px-4 mb-8">Lo Más Vendido</h1>
            <div class="glider-contain ">
                <div class="prelacionado">
                    @foreach ($subcategories as $subcategory)
                        @foreach ($subcategory->products as $product)
                            <div class="mx-4 border-2 overflow-hidden border-white rounded-xl bg-white">
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
                                <a href="{{ route('products.show', $product) }}">

                                    <div class="py-2 px-2">
                                        {{-- <p class="text-gray-400 font-medium text-xs  uppercase">
                                            {{ $product->subcategory->name }}</p> --}}

                                        <h1 class="text-xs text-left font-medium scrollflow -slide-bottom -opacity truncate">
                                            {{ $product->name }}
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
                            </div>
                        @endforeach
                    @endforeach
                </div>

                <button aria-label="Previous" class="glider-prev glid-img1 p-2">
                    <span class="bg-white border-2 border-gray-400 rounded-full p-3"> <i
                            class="text-xl  fas fa-chevron-left"></i></span>
                </button>
                <button aria-label="Next" class="glider-next glid-img2">
                    <span class="bg-white border-2 border-gray-400 rounded-full p-3">
                        <i class="text-xl fas fa-chevron-right"></i></span>

                </button>
            </div>
        </div>
    </div>

    @push('script')
    
    <script src="{{ asset('vendor/flexSlider/jquery.flexslider-min.js') }}"></script>
        <script>
            // Can also be used with $(document).ready()
           

            new Glider(document.querySelector('.prelacionado'), {
                slidesToShow: 3,
                slidesToScroll: 1,
                draggable: true,
                dots: '.dots',
                arrows: {
                    prev: '.glider-prev',
                    next: '.glider-next'
                },
                responsive: [{
                        // screens greater than >= 775px
                        breakpoint: 768,
                        settings: {
                            // Set to `auto` and provide item width to adjust to viewport
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            itemWidth: 150,
                            duration: 1.5
                        }
                    },

                    {
                        // screens greater than >= 1024px
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 4,
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
                            slidesToShow: 6,
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
                        breakpoint: 425,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            itemWidth: 150,
                            duration: 0.25,
                            arrows: false
                        }
                    },
                    {
                        // screens greater than >= 1024px
                        breakpoint: 320,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            itemWidth: 150,
                            duration: 0.25,
                            arrows: false
                        }
                    }

                ]
            });
        </script>
    @endpush

</div>
