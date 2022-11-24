<div>
    @push('css')
        
    @endpush

    <div class="container">
        <p class="text-center mt-4">aca ira las fotos con Dropzone</p>
        <div class="mb-4" wire:ignore>
            <form action="" method="POST" class="dropzone" id="my-awesome-dropzone">

            </form>
<form action="/file-upload"
      class="dropzone"
      id="my-awesome-dropzone"></form>
        </div>

        {{-- @if ($product->images->count())
            <section class="bg-white shadow-xl rounded-lg p-6 mb-4">
                <h1 class="text-2xl text-center font-semibold mb-2">Imagenes del producto</h1>
                <p class="text-sm">Actualizado</p>
                <ul class="flex flex-wrap">
                    @foreach ($product->images as $image)
                        <li class="relative" wire:key="image-{{ $image->id }}">
                            <img class="w-32 h-20 object-cover" src="{{ Storage::url($image->url) }}" alt="">
                            <x-jet-danger-button class="absolute right-2 top-2"
                                wire:click="deleteImage({{ $image->id }})" wire:loading.attr="disabled"
                                wire:target="deleteImage({{ $image->id }})">
                                x
                            </x-jet-danger-button>
                        </li>
                    @endforeach

                </ul>
            </section>
        @endif --}}
    </div>

    @push('script')
        
        <script>
            
            Dropzone.options.myAwesomeDropzone = {
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                dictDefaultMessage: "Arrastre una o varias imagenes al recuadro",
                acceptedFiles: 'image/*',
                paramName: "file", // The name that will be used to transfer the file
                maxFilesize: 2, // MB
                complete: function(file) {
                    this.removeFile(file);
                },
                queuecomplete: function() {
                    Livewire.emit('refreshProduct');
                }

            };
        </script>
    @endpush

</div>
