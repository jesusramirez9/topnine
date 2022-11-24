<div wire:init="loadPosts">
    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{ $category->id }}">
                @foreach ($products as $product)
                    <div class="mx-2 border-2 overflow-hidden border-white rounded-xl bg-white">
                        <figure class="py-0 px-0 relative">
                            <div class="absolute z-30 mt-2 ml-2">
                                @if ($product->offer == 0)
                                @else
                                    <div class="bg-red-600 text-white px-1 py-1 w-9 rounded-lg z-10">
                                        <p class="text-center text_oferta font-semibold">
                                            
                                            -{{ intval((($product->offer - $product->price) / $product->offer) * 100) }}%
                                            
                                        </p>
                                    </div>
                                @endif
                            </div>
                            @if ($product->images->count())
                                <img class="h-36 w-full object-cover object-center scrollflow -slide-bottom -opacity"
                                    src="{{ Storage::url($product->images->first()->url) }}" alt="">
                            @else
                                <img class="h-36 w-full object-cover object-center"
                                    src="https://images.pexels.com/photos/5082560/pexels-photo-5082560.jpeg?cs=srgb&dl=pexels-cottonbro-5082560.jpg&fm=jpg"
                                    alt="">
                            @endif

                        </figure>
                        <a href="{{ route('products.show', $product) }}">

                            <div class="py-2 px-4 ">
                                {{-- <p class="text-gray-400 font-medium text-xs  uppercase">
                                    {{ $product->subcategory->name }}</p> --}}

                                <h1 class="text-sm font-medium  py-2 scrollflow -slide-bottom -opacity">

                                    {{ Str::limit($product->name, 40, '...') }}

                                </h1>
                                <div class="">
                                    @if ($product->offer != 0)
                                        <p class="text-xs text-gray-400">Precio normal: <span
                                                class=" text-gray-400 line-through">s/ {{ $product->offer }}
                                            </span></p>
                                    @else
                                    @endif
                                    <p class="font-medium">Precio oferta: <span
                                            class="text-sm  scrollflow -slide-bottom -opacity">
                                            S/ {{ $product->price }}</span></p>

                                </div>

                                {{-- <div class="flex justify-center py-4">
                                <button
                                    class="text-white w-full font-medium text-sm bg-orange-600 hover:bg-orange-500 px-5 py-2 rounded-lg"><i
                                        class="fa-solid fa-magnifying-glass mr-2"></i>Ver producto</button>
                            </div> --}}


                            </div>
                        </a>
                    </div>
                @endforeach
            </ul>

            <button aria-label="Previous" class="glider-prev"> <span
                    class="bg-white border-2 border-gray-200 rounded-lg p-3"> <i
                        class="text-xl  fas fa-chevron-left"></i> </button>
            <button aria-label="Next" class="glider-next">
                <span class="bg-white border-2 border-gray-200 rounded-lg p-3"> <i
                        class="text-xl  fas fa-chevron-right"></i>
            </button>
            {{-- <div role="tablist" class="dots"></div> --}}
        </div>
    @else
        <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
            <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
        </div>

    @endif

</div>
