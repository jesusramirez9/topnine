<div>
    <div>
        <div class=" mt-14">
            <h1 class="font-medium text-xl px-4 mb-8">Lo Más Vendido</h1>
            <div class="glider-contain ">
                <div class="prelacionado">
                    @foreach ($subcategories as $subcategory)
                        @foreach ($subcategory->products as $product)
                            <div class="mx-4 border-2 overflow-hidden border-white rounded-xl bg-white">
                                <figure class="py-2 px-4 ">

                                    @if ($product->images->count())
                                        <img class="h-80 w-full object-cover object-center scrollflow -slide-bottom -opacity"
                                            src="{{ Storage::url($product->images->first()->url) }}" alt="">
                                    @else
                                        <img class="h-80 w-full object-cover object-center"
                                            src="https://images.pexels.com/photos/5082560/pexels-photo-5082560.jpeg?cs=srgb&dl=pexels-cottonbro-5082560.jpg&fm=jpg"
                                            alt="">
                                    @endif

                                </figure>
                                <a href="{{ route('products.show', $product) }}">

                                    <div class="py-2 px-4 ">
                                        <p class="text-gray-400 font-medium text-xs  uppercase">
                                            {{ $product->subcategory->name }}</p>

                                        <h1 class="text-normal font-medium  py-3 scrollflow -slide-bottom -opacity">

                                            {{ Str::limit($product->name, 40, '...') }}

                                        </h1>
                                        <div class="flex justify-between">
                                            @if ($product->offer != 0)
                                                <p class=" text-gray-400 line-through">s/ {{ $product->offer }}
                                                </p>
                                            @else
                                            @endif
                                            <p class="font-bold  scrollflow -slide-bottom -opacity">
                                                S/ {{ $product->price }}</p>

                                        </div>

                                        <div class="flex justify-center py-4">
                                            <button
                                                class="text-white w-full font-medium text-sm bg-orange-600 hover:bg-orange-500 px-5 py-4 rounded-lg"><i
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
        <script>
            // Can also be used with $(document).ready()
            $(document).ready(function() {
                $('.flexslider').flexslider({
                    animation: "slide",
                    controlNav: "thumbnails"
                });
            });

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
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
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
                            slidesToShow: 1,
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
