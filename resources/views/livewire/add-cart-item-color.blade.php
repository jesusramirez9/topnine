<div x-data>
    <p class="text-xl text-gray-700 ">Color:</p>
    <div class="divsize mt-2">
        @foreach ($colors as $color)
            <div class="btn-group" role="group">
                <input wire:model="color_id" type="radio" class="btn-check" value="{{ $color->id }}" name="color" id="{{ __($color->name) }}"
                    autocomplete="off" >
                <label class="mr-3 btn_talla btn_color" for="{{ __($color->name) }}" title="{{$color->name}}">
                    <div class="imageProduct" style="background-image: url('{{ $color->pivot ? Storage::url($color->pivot->image) : '' }}')"></div>
                </label>
            </div>
        @endforeach

        {{-- <select wire:model="color_id"
        class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm">
            <option value="" selected disabled>Seleccionar un color</option>
            @foreach ($colors as $color)
                <option class="capitalize" value="{{ $color->id }}">{{ __($color->name) }}</option>
            @endforeach
        </select> --}}
    </div>
    <p class="text-gray-700 my-4 text-sm lg:text-base">
        <span class="text-lg font-semibold">Stock disponible: </span>
        @if ($quantity)
            {{ $quantity }}
        @else
            {{ $product->stock }}
        @endif
    </p>
    <div class="flex mt-4">
        <div class="mr-4 bordradiu">
            <x-jet-secondary-button class="btn_menmas" disabled x-bind:disabled="$wire.qty <= 1"
                x-bind:disabled="$wire.qty > $wire.quantity" wire:loading.attr="disabled" wire:target="decrement"
                wire:click="decrement">
                -
            </x-jet-secondary-button>
            <span class="mx-2 text-gray-700 qtydad">{{ $qty }}</span>
            <x-jet-secondary-button class="btn_menmas" x-bind:disabled="$wire.qty >= $wire.quantity"
                wire:loading.attr="disabled" wire:target="increment" wire:click="increment">
                +
            </x-jet-secondary-button>
        </div>
        <div class="flex-1">
            <div class="itemcolbtnweb">
                <x-button wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem"
                    x-bind:disabled="!$wire.quantity" color="orange" class="w-full">
                    Realizar compra
                </x-button>
            </div>
            <div class="itemcolorbtn">
                <x-button wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem"
                    x-bind:disabled="!$wire.quantity" color="orange" class="w-full">
                    Comprar
                </x-button>
            </div>


        </div>
    </div>
    <div>
        <div class="mt-4 text-xs lg:text-sm">
            <p class="uppercase text-gray-300 font-semibold">Código: {{ $product->code }}</p>
            <p class=" text-gray-300 font-semibold">Categoría: <span class="uppercase">
                    {{ $product->subcategory->name }}</span> </p>
        </div>
    </div>
    <x-jet-dialog-modal wire:model="open_edit">
        <div class="modalPublicidad">
            <x-slot name="title">
            </x-slot>
            <x-slot name="content">
                <div class="slide_rlg">
                    @livewire('modal-cart')
                </div>

            </x-slot>
            <x-slot name="footer">
                <x-jet-button wire:click="$set('open_edit', false)" class="mr-4">
                    Continuar viendo
                </x-jet-button>
            </x-slot>
        </div>
    </x-jet-dialog-modal>
</div>
