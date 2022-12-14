<div class="flex-1 relative" x-data>

    <form action="{{route('search')}}" autocomplete="off">
        <x-jet-input name="name" wire:model="search" type="text" class="w-full buscador text-xs" placeholder="¿Qué estás buscando?" />
    <button class="absolute  top-0 right-0 w-12 h-full  flex items-center bg_top_naranja justify-center rounded-r-md">
        
        <img src="{{asset('img/logo/search.svg')}}" class="w-5" alt="">
    </button>
    </form>

    
    <div class="absolute w-full mt-1 hidden z-30" :class="{'hidden': !$wire.open}" @click.away="$wire.open = false" >
        <div class="bg-white rounded-lg shadow mt-1 text-xs xl:text-sm">
            <div class="px-4 py-3 space-y-1">
                @forelse ($products as $product)
                    <a href="{{route('products.show', $product)}}" class="flex hover:bg-gray-100 hover:opacity-70">
                        <img class="w-16 h-12 object-cover" src="{{Storage::url($product->images->first()->url)}}" alt="">
                        <div class="ml-4 text-gray-700">
                            <p class="text-sm xl:text-lg leading-5 font-semibold">
                                {{$product->name}}
                            </p>
                            <p>
                              Categoría: {{$product->subcategory->category->name}}  
                            </p>
                        </div>
                    </a>
                @empty
                <p class="text-lg leading-5 font-semibold">
                    No existe ningún registro con los parametros especificados
                </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
