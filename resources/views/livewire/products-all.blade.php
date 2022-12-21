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
                                <figure>

                                    @if ($product->images->count())
                                        <img class="h-44 xl:h-80 w-full object-cover object-center scrollflow -slide-bottom -opacity"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    @else
                                        <img class="h-44 xl:h-80 w-full object-cover object-center"
                                            src="https://images.pexels.com/photos/5082560/pexels-photo-5082560.jpeg?cs=srgb&dl=pexels-cottonbro-5082560.jpg&fm=jpg"
                                            alt="">
                                    @endif

                                </figure>
                                <a href="{{ route('products.show', $product) }}">

                                    <div class="py-2 px-1 lg:px-2 ">
                                        <p class="text-gray-400 font-medium text-xs  uppercase">
                                            {{ $product->subcategory->name }}</p>

                                        <h1 class="text-normal font-medium  py-1 scrollflow -slide-bottom -opacity">

                                            {{ Str::limit($product->name, 40, '...') }}

                                        </h1>
                                        <div class="lg:flex lg:justify-between items-center">
                                            @if ($product->offer != 0)
                                               <p class="text-xs text-gray-400">Antes: <span class=" text-gray-400 line-through">s/ {{ $product->offer }}
                                                </span></p>
                                            @else
                                            @endif
                                            <p class="font-medium text-sm scrollflow -slide-bottom -opacity">
                                               PEN S/ {{ $product->price }}</p>

                                        </div>

                                        <div class="flex justify-center py-4">
                                            <button
                                                class="text-white w-full font-medium text-xs lg:text-sm bg-orange-600 hover:bg-orange-500 px-2 lg:px-5 py-2 rounded-lg"><i
                                                    class="fa-solid fa-magnifying-glass mr-2"></i>Ver producto</button>
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
                            slidesToShow: 5,
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
