<x-app-layout>

    <div class="bg-gray-100">
        <div class="container  py-8">
            <div class="pt-4 pl-4 grid grid-cols-1 bg-white md:grid-cols-2 gap-4 md:gap-24 ">
                <div>
                    <!-- Place somewhere in the <body> of your page -->
                    {{-- <div class="md:mt-0 mb-3">
                    <p class=""> {{$product->subcategory->name}} <i class="fas fa-arrow-right ml-4 mr-4"></i> <span class="">{{ $product->name }}</span> </p>
                    </div> --}}
                    <div class="flexslider ">
                        <ul class="slides">

                            @foreach ($product->images as $image)
                                <li class="" data-thumb="{{ Storage::url($image->url) }}">
                                    <img class="" src="{{ Storage::url($image->url) }}" />
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
                <div class="-mt-8 md:mt-12">
                    {{-- <p class="text-base mb-4 mx-6 md:mx-0">Calificación: {{ round($product->reviews->avg('rating'), 1) }}
                    <i class="fas fa-star text-yellow-400 "></i>
                          </p> --}}
                    <p class="mb-4 uppercase mx-6 md:mx-0"><span class="text-gray-500 font-semibold">
                            {{ $product->subcategory->name }}</span> </p>

                    <h1 class=" font-bold text-3xl mx-6 md:mx-0"> {{ $product->name }}</h1>
                    <div class="flex mt-4 mx-6 md:mx-0">

                        <a class="underline hover:text-orange-600" href="#resña">{{ count($product->reviews) }}
                            comentarios
                            de nuestros clientes</a>
                    </div>
                    <div class="flex items-center mx-6 md:mx-0">
                        <p class="text-2xl my-4 font-semibold "><span class="text-xs">S/</span>
                            {{ $product->price }}</p>
                        <div class="mx-4">
                            @if ($product->offer != 0)
                                <p class=" text-gray-300 line-through">S/ {{ $product->offer }}</p>
                            @else
                            @endif
                        </div>
                    </div>

                    @if ($product->subcategory->size)
                        @livewire('add-cart-item-size', ['product' => $product])
                    @elseif($product->subcategory->color)
                        @livewire('add-cart-item-color', ['product' => $product])
                    @else
                        @livewire('add-cart-item', ['product' => $product])
                    @endif

                    <div x-show="activeTab===0"><p class="text-justify">{!! $product->description !!}</p></div>
                            <div x-show="activeTab===1"> <p class="text-justify"> {!! $product->specification !!}</p></div>
                </div>
            </div>

            <div class=" mt-10">
                <div class="flex justify-center items-center ">
                    <!--actual component start-->
                    <div class="w-full" x-data="setup()">
                        <ul class="flex justify-start items-center  ">
                            <template x-for="(tab, index) in tabs" :key="index">
                                <li class="cursor-pointer shadow-md py-2 px-4 text-gray-500 border-b-8"
                                    :class="activeTab===index ? 'text-green-500 border-green-500 rounded-t-lg bg-white' : ''" @click="activeTab = index"
                                    x-text="tab"></li>
                            </template>
                        </ul>
                
                        <div class="w-full bg-white p-4 text-center  border">
                            <div x-show="activeTab===0"><p class="text-justify">{!! $product->description !!}</p></div>
                            <div x-show="activeTab===1"> <p class="text-justify"> {!! $product->specification !!}</p></div>
                        
                        </div>
  
                    </div>
                    <!--actual component end-->
                </div>
            </div>

            {{-- <div class="container mt-5 md:mt-2 bg-white">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 gap-6 md:gap-8  p-4 md:p-6  divide-gray-500  divide-opacity-20">

                    <div>
                        <p class="font-bold">Descripción del producto</p>

                        <p class="text-justify">{!! $product->description !!}</p>
                    </div>
                    <div>
                        <p class="font-bold">Especificación del producto</p>
                        <p class="text-justify">

                            {!! $product->specification !!}
                        </p>
                    </div>
                </div>

            </div> --}}

            <div class="text-left ">
                <div class="text-left pt-8 ">
                    <p class="text-lg md:text-2xl ">Más modelos encontrados en mi EMPRESA | <span
                            class="text-black font-semibold text-xl lg:text-2xl">{{ $product->subcategory->name }}</span>
                    </p>
                </div>
                <div>
                    @livewire('products-all')
                </div>
            </div>


            <div class="bg-white mt-8">
                <a name="resña"></a>
                @livewire('products-reviews', ['product' => $product])
            </div>

        </div>
    </div>
    @push('script')
    <script>
        function setup() {
        return {
          activeTab: 0,
          tabs: [
              "Descripción del producto",
              "Especificación del producto",
           
          ]
        };
      };
    </script>
    @endpush


</x-app-layout>
