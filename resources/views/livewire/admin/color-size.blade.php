<div class="mt-4">
    <div class="bg-gray-100  shadow-lg rounded-lg p-6">
        <div class="grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>
                    Color
                </x-jet-label>

                <div class="mb-6">
                    <div class="">
                        <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                            wire:model.defer="color_id">
                            <option selected>Seleccionar color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ strtoupper($color->name) }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="color_id" />
                    </div>
                </div>
                
                <div>
                    <x-jet-label>Cantidad</x-jet-label>
                    <x-jet-input class="w-full" placeholder="Ingrese una cantidad" wire:model.defer="quantity" type="number" />
                    <x-jet-input-error for="quantity" />
                </div>
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>Imagen(Producto)</x-jet-label>
                @if ($imageColor)
                    <div class="my-2 block">
                        <img class="w-full h-20 object-contain object-center" src="{{ $imageColor->temporaryUrl() }}">
                    </div>
                @endif
                <div class="">
                    <div wire:loading wire:model.defer="imageColor"
                        class="mb-4 bg-red-100 border border-red-400 text-xs text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">
                            Imagen Cargando,
                        </strong>
                        <span class="block sm:inline">espere un momento hasta que la imagen se haya procesado..</span>
                    </div>
                </div>
                <div class="">
                    <input wire:model.defer="imageColor" accept="image/*" class="mt-1 customFile shadow-sm rounded-md w-full" type="file" name="file">
                    <x-jet-input-error for="imageColor" />
                </div>
            </div>
        </div>

        <div class="flex mt-4 justify-end items-center">
            <x-jet-action-message class="mr-3" on="saved">
                Agregado
            </x-jet-action-message>
            <x-jet-button wire:loading.attr="disabled" wire:target="save" wire:click="save">
                Agregar
            </x-jet-button>
        </div>
    </div>
    @if ($size_colors->count())
        <div class="mt-8">
            <table class="w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2 w-1/4">Color</th>
                        <th class="px-4 py-2 w-1/4">Imagen(Producto)</th>
                        <th class="px-4 py-2 w-1/4">Cantidad</th>
                        <th class="px-4 py-2 w-1/4"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($size_colors as $size_color)
                        <tr wire:key="size_color-{{ $size_color->pivot->id }}">
                            <td class="capitalize px-4 py-2">
                                {{ $colors->find($size_color->pivot->color_id)->name }}
                            </td>
                            <td class="px-4 py-2">
                                @if ($size_color->pivot->image)
                                    <img src="{{ Storage::url($size_color->pivot->image) }}" width="80px">
                                @else
                                    <span>No tiene imagen</span>
                                @endif
                            </td>
                            <td class="px-4 py-2">
                                {{ $size_color->pivot->quantity }} unidades
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex">
                                    <x-jet-secondary-button class="ml-auto mr-2"
                                        wire:click="edit({{ $size_color->pivot->id }})" wire:loading.attr="disabled"
                                        wire:target="edit({{ $size_color->pivot->id }})">
                                        Actualizar
                                    </x-jet-secondary-button>
                                    <x-jet-danger-button
                                        wire:click="$emit('deleteColorSize',{{ $size_color->pivot->id }} )">
                                        Eliminar
                                    </x-jet-danger-button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    {{-- modal --}}

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">Editar colores</x-slot>
        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label>Color</x-jet-label>
                <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                    wire:model="pivot_color_id">
                    <option value="{{ $color->id }}" disabled>Seleccione un color</option>
                    @foreach ($colors as $color)
                        <option value="{{ $color->id }}">{{ strtoupper($color->name) }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-4">
                <x-jet-label>Cantidad</x-jet-label>
                <x-jet-input wire:model="pivot_quantity" type="number" placeholder="Ingrese una cantidad" class="w-full"></x-jet-input>
            </div>
            <div class="">
                <x-jet-label>Imagen(Producto)</x-jet-label>
                @if ($editImage)
                    <div class="my-2 block">
                        <img class="w-full h-20 object-contain object-center" src="{{ $editImage->temporaryUrl() }}">
                    </div>
                @elseif ($pivot_image)
                    <div class="my-2 block">
                        <img class="w-full h-20 object-contain object-center" src="{{ Storage::url($pivot_image) }}">
                    </div>
                @endif
                <div class="">
                    <div wire:loading wire:model.defer="editImage"
                        class="mb-4 bg-red-100 border border-red-400 text-xs text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">
                            Imagen Cargando,
                        </strong>
                        <span class="block sm:inline">espere un momento hasta que la imagen se haya procesado..</span>
                    </div>
                </div>
                <div class="">
                    <input wire:model.defer="editImage" accept="image/*" class="mt-1 customFile shadow-sm rounded-md w-full" type="file" name="file">
                    <x-jet-input-error for="editImage" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$set('open', false)" wire:loading.attr="disabled" wire:target="open">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-button wire:click="update" wire:loading.attr="disabled" wire:target="update">
                Actualizar
            </x-jet-button>
        </x-slot>

    </x-jet-dialog-modal>
    @push('script')
        <script></script>
    @endpush
</div>
