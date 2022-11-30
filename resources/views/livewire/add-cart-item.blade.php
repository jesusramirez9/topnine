<div x-data>
    <p class="text-gray-700 mb-4 mt-4 mx-6 md:mx-0"> <span class="text-lg font-semibold">Stock disponible:
        </span>{{ $quantity }}</p>
    <div class="flex items-center ml-6 md:ml-0">
        
        <div class="mr-4 bordradiu">

            <button class="btn_menmas hover:bg-gray-300 rounded-lg px-4 py-1 bg-gray-100" disabled
                x-bind:disabled="$wire.qty <= 1" wire:loading.attr="disabled" wire:target="decrement"
                wire:click="decrement">
                -
            </button>
            <span class="mx-2 text-gray-700 qtydad">{{ $qty }}</span>
            <button class="btn_menmas hover:bg-gray-300 rounded-lg px-4 py-1 bg-gray-100"
                x-bind:disabled="$wire.qty >= $wire.quantity" wire:loading.attr="disabled" wire:target="increment"
                wire:click="increment">
                +
            </button>
        </div>
        <div class="flex-1">
            <div class="itemcolbtnweb">
                <x-button
                    color="orange"
                    x-bind:disabled="$wire.qty > $wire.quantity" wire:click="addItem" wire:loading.attr="disabled"
                    wire:target="addItem">Realizar compra</x-button>

                {{-- <x-button color="orange" x-bind:disabled="$wire.qty > $wire.quantity" class="w-full"
                    wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem">
                    Agregar a la bolsa
                </x-button> --}}
            </div>
            <div class="itemcolorbtn">
                <x-button color="orange" x-bind:disabled="$wire.qty > $wire.quantity" class="w-full"
                    wire:click="addItem" wire:loading.attr="disabled" wire:target="addItem">
                    Comprar 
                </x-button>
            </div>

        </div>
    </div>
    <div class="mt-8 md:mx-0">
        <div>
            <div class="mt-4 text-xs lg:text-sm">
                <p class="uppercase text-gray-300 font-semibold">Código: {{ $product->code }}</p>
                <p class=" text-gray-300 font-semibold">Categoría: <span class="uppercase">
                        {{ $product->subcategory->name }}</span> </p>
            </div>
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
