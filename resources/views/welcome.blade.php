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
        
    @endpush

</x-app-layout>
