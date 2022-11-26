<x-app-layout>


    @push('link')
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    @endpush
    <div class="bg-gray-100">
       
     
        <div class="container py-8">
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
            $(document).ready(function() {
                $('.slide_rlg').slick();
            });
        </script>
        <script>
            livewire.on('glider', function(id) {

                new Glider(document.querySelector('.glider-' + id), {
                    slidesToScroll: 1,
                    slidesToShow: 1,
                    draggable: true,
             //       dots: '.glider-' + id + '~ .dots',
                    dots: false,
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                    responsive: [{
                            breakpoint: 640,
                            settings: {
                                slidesToScroll: 2.5,
                                slidesToShow: 2,
                            }
                        },
                        {
                            breakpoint: 768,
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
            
        </script>
        
    @endpush

</x-app-layout>
