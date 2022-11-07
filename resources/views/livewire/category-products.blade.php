<div wire:init="loadPosts">
    @if (count($products))
        <div class="glider-contain">
            <ul class="glider-{{$category->id}}">
                @foreach ($products as $product)
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
            </ul>

            <button aria-label="Previous" class="glider-prev"> <span class="bg-white border-2 border-gray-200 rounded-lg p-3"> <i
                class="text-xl  fas fa-chevron-left"></i> </button>
            <button aria-label="Next" class="glider-next">
                <span class="bg-white border-2 border-gray-200 rounded-lg p-3"> <i
                    class="text-xl  fas fa-chevron-right"></i>
            </button>
            <div role="tablist" class="dots"></div>
        </div>
    @else 
    <div class="mb-4 h-48 flex justify-center items-center bg-white shadow-xl border border-gray-100 rounded-lg">
        <div class="rounded animate-spin ease duration-300 w-10 h-10 border-2 border-indigo-500"></div>
   </div>		

    @endif

</div>
