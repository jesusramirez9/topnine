<div>
    @push('link')
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    @endpush
    <x-show-modal wire:model="open_edit" class="mx-0 px-0 py-0 my-0">
        <div class="modalPublicidad">
            <x-slot name="title">
            </x-slot>
            <x-slot name="content" class="relative">
                <div class="absolute z-10 right-0">
                    <button wire:click="$set('open_edit', false)" class="bg-gray-600 font-semibold hover:bg-gray-800 w-6 h-6 leading-none text-white">X</button>
                </div>
                <div class="flayer ">
                    @foreach ($posts as $item)
                        <div>
                           {{--<div class="pb-2 text-gray-700 text-lg uppercase font-semibold tracking-wider">
                                {{ $item->title }}
                            </div>--}} 
                            <img src="{{ Storage::url($item->image) }}" class="w-full" alt="">
                           {{--  <div class="py-2 text-gray-700 text-sm text-justify ">
                                {{ $item->description }}
                            </div>--}} 
                        </div>
                    @endforeach
                    
                </div>
                
            </x-slot>
            <x-slot name="footer">
               {{--  <x-jet-button wire:click="$set('open_edit', false)" class="mr-4">
                    Aceptar
                </x-jet-button>--}} 
            </x-slot>
        </div>
    </x-show-modal>

    @push('script')
    <script type="text/javascript" src="{{asset('js/slick.min.js')}}"></script>
        <script>
            $(document).ready(function() {
                $('.flayer').slick();
            });
        </script>
    @endpush

</div>
