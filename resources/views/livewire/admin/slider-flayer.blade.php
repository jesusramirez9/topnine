<div class="container py-12">
    <h2 class="text-center mb-8 text-lg font-medium text-gray-900">Administrar recursos de la vista principal</h2>
    
    <x-jet-form-section submit="save" class="mb-6">
        <x-slot name="title">
            Crear nuevo banner
        </x-slot>
        <x-slot name="description">
            Complete la información necesaria para poder registrar un banner
        </x-slot>

        <x-slot name="form">
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>Nombre</x-jet-label>
                <x-jet-input wire:model="createForm.name" type="text" class="w-full mt-1"></x-jet-input>
                <x-jet-input-error for="createForm.name" />
            </div>
            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>Orden</x-jet-label>
                <x-jet-input wire:model="createForm.order" type="number" class="mt-1" min=0></x-jet-input>
                <x-jet-input-error for="createForm.order" />
            </div>
            <div class="col-span-6">
                <div class="flex">
                    <label class="mr-6">
                        <input wire:model.defer="createForm.status" type="radio" name="status" value="1">
                        Marcar banner como activo
                    </label>
                    <label>
                        <input wire:model.defer="createForm.status" type="radio" name="status" value="0">
                        Marcar banner como inactivo
                    </label>
                </div>
                <x-jet-input-error for="createForm.status" />
            </div>

            <div class="col-span-6 sm:col-span-3">
                <x-jet-label>Imagen</x-jet-label>
                @if ($createForm['image'])
                    <div class="my-2 block">
                        <img class="w-full h-20 object-contain object-center" src="{{ $createForm['image']->temporaryUrl() }}">
                    </div>
                @endif
                <div class="">
                    <div wire:loading wire:target="createForm.image" class="mb-4 bg-red-100 border border-red-400 text-xs text-red-700 px-4 py-3 rounded relative">
                        <strong class="font-bold">
                            Imagen Cargando,
                        </strong>
                        <span class="block sm:inline">espere un momento hasta que la imagen se haya procesado..</span>
                    </div>
                </div>
                <div class="">
                    <input wire:model="createForm.image" accept="image/*" class="mt-1 customFile form-control-file block w-full text-base font-normal text-gray-700 bg-white bg-clip-padding border border-solid border-gray-300 rounded transition ease-in-out focus:text-gray-700 focus:bg-white focus:border-blue-600 focus:outline-none" type="file" name="file">
                    <x-jet-input-error for="createForm.image" />
                </div>
            </div>
        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                Banner creado
            </x-jet-action-message>
            <x-jet-button>
                Agregar
            </x-jet-button>
        </x-slot>
    </x-jet-form-section>

    <x-jet-action-section>
        <x-slot name="title">
            Banners de oferta
        </x-slot>
        <x-slot name="description">
            Aquí agregarás todos los banners de ofertas.
        </x-slot>
        <x-slot name="content">
            <table class="table text-gray-600 w-full">
                <thead class="border-b border-gray-300">
                    <tr class="text-left">
                        <th class="py-2">#</th>
                        <th class="py-2">Nombre</th>
                        <th class="py-2">Imagen</th>
                        <th class="py-2">Orden</th>
                        <th class="py-2">Estado</th>
                        <th class="py-2" width="150px">Acción</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-300">
                    @foreach ($sliders as $slider)
                        <tr>
                            <td class="py-2">{{ $slider->id }}</td>
                            <td class="py-2">{{ $slider->name }}</td>
                            <td class="py-2">
                                <img src="{{ Storage::url($slider->image) }}" width="80px">
                            </td>
                            <td class="py-2">{{ $slider->order }}</td>
                            <td class="py-2">
                                @switch($slider->status)
                                    @case(0)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-600">
                                            INACTIVO
                                        </span>
                                    @break
                                    @case(1)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            ACTIVO
                                        </span>
                                    @break
                                    @default
                                @endswitch    
                            </td>
                            <td class="py-2">
                                <div class="flex divide-x divide-gray-300 font-semibold">
                                    <a class="pr-2 hover:text-blue-600 cursor-pointer"
                                        wire:click="edit('{{ $slider->id }}')">Editar</a>
                                    <a class="pl-2 hover:text-red-600 cursor-pointer"
                                        wire:click="$emit('delete','{{ $slider->id }}')">Eliminar</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </x-slot>
    </x-jet-action-section>

    <x-jet-dialog-modal wire:model="editForm.open">
        <x-slot name="title">
            Editar banner
        </x-slot>
        <x-slot name="content">
            <div class="space-y-3">
                <div>
                    @if ($editImage)
                        <img class="w-full h-64 object-contain object-center" src="{{ $editImage->temporaryUrl() }}">
                    @else
                        <img class="w-full h-64 object-contain object-center" src="{{Storage::url($editForm['image'])}}">
                    @endif
                </div>

                <div>
                    <x-jet-label>Nombre</x-jet-label>
                    <x-jet-input wire:model="editForm.name" type="text" class="w-full mt-1"></x-jet-input>
                    <x-jet-input-error for="editForm.name" />
                </div>
                <div>
                    <x-jet-label>Orden</x-jet-label>
                    <x-jet-input wire:model="editForm.order" type="number" min=0 class="w-full mt-1"></x-jet-input>
                    <x-jet-input-error for="editForm.order" />
                </div>
                <div class="flex">
                    <label class="mr-6">
                        <input wire:model.defer="editForm.status" type="radio" name="status" value="1">
                        Marcar banner como activo
                    </label>
                    <label>
                        <input wire:model.defer="editForm.status" type="radio" name="status" value="0">
                        Marcar banner como inactivo
                    </label>
                </div>
                <div>
                    <x-jet-label>Imagen</x-jet-label>
                    <input wire:model="editImage" accept="image/*" class="mt-1" type="file" name="file">
                    <x-jet-input-error for="editImage" />
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-jet-danger-button wire:click="update" wire:loading.attr="disabled" wire:target="editImage, update">
                Actualizar
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
