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

        {{-- <div class="my-6 md:my-14">
            <p class="text-center text-xl md:text-3xl tracking-wide">Es hora de ponerte en marcha</p>
        </div>

        <div class="my-10 md:my-14">
            <div class="grid grid-cols-2 justify-center items-center bg-orange-800">
                <div class="bg-orange-800 text-white">
                    <h1 class="mx-28 text-3xl">We produce and sell the best sports shoes in the US. But we do not
                        restrict
                        our models to be just pragmatic.</h1>
                    <p class="mx-28 text-2xl mt-4">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste eveniet molestias incidunt
                        blanditiis!
                        Error dolores, tenetur harum, vitae ullam officia obcaecati sit eveniet repellendus accusamus,
                        autem
                        corrupti at nostrum blanditiis!
                    </p>
                    <div class="mx-28 mt-8">
                        <button
                            class=" border-2 border-white px-6 py-2 text-xl hover:bg-white hover:border-orange-800 cursor-pointer hover:text-purple-800 hover:ease-out hover:transform hover:font-bold">
                            Conocenos
                        </button>
                    </div>
                </div>
                <div class="w-full h-contacto bg-cover bg-bottom object-cover object-center"
                    style="background-image: url('{{ asset('imgz/home/image44.jpg') }}'); background-repeat: no-repeat;">
                </div>
            </div>
        </div> --}}

        
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
    @endpush

</x-app-layout>
