<x-app-layout>
    <div class="container">
        @livewire('navigation-responsive')
    </div>
    <div class="container py-10">
        <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8 ">
            <div class="mx-6 md:mx-0">
                <p class="my-4 text-2xl font-bold top_naranja">Contáctanos:</p>
                <form id="formularios" action="{{ route('contacto.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2 mt-5">
                        <input name="name"
                            class="w-full bg-gray-50 text-gray-900 mt-2 p-3 brdinput focus:outline-none focus:shadow-outline"
                            type="text" placeholder="Nombres*" />
                        @error('name')
                            <p><strong>{{ $message }}</strong></p>
                        @enderror
                        <input name="Apellidos"
                            class="w-full bg-gray-50 text-gray-900 mt-2 p-3 brdinput focus:outline-none focus:shadow-outline"
                            type="text" placeholder="Apellidos*" />
                        @error('Apellidos')
                            <p><strong>{{ $message }}</strong></p>
                        @enderror
                        <input name="correo"
                            class="w-full bg-gray-50 text-gray-900 mt-2 p-3 brdinput focus:outline-none focus:shadow-outline"
                            type="email" placeholder="Correo electrónico*" />
                        @error('correo')
                            <p><strong>{{ $message }}</strong></p>
                        @enderror
                        <input name="celular"
                            class="w-full bg-gray-50 text-gray-900 mt-2 p-3 brdinput focus:outline-none focus:shadow-outline"
                            type="number" placeholder="Teléfono*" />
                        @error('celular')
                            <p><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>
                    <div class="my-4">
                        <textarea name="mensaje" placeholder="Mensaje*"
                            class="w-full h-32 bg-gray-50 text-gray-900 mt-2 p-3 brdinput focus:outline-none focus:shadow-outline"></textarea>
                        @error('mensaje')
                            <p><strong>{{ $message }}</strong></p>
                        @enderror
                    </div>
                    <div class="my-4">
                        <x-jet-validation-errors class="mb-4" />
                    </div>
                    <div class="my-2  text-right">
                        <button type="submit"
                            class="g-recaptcha font-bold tracking-wide bg-gray-700 hover:bg-gray-600 text-gray-50 rounded-lg px-4 py-2   
                          focus:outline-none focus:shadow-outline"
                          >
                            Enviar
                        </button>
                    </div>
                </form>

            </div>
            <div>
                <div class="grid grid-cols-2 text-center " >
                    <div class=" border-r-2 border-gray-500 border-b-2 border-opacity-10 py-4">
                        <div>
                            <i class="fas fa-map-marker-alt font-24 text-yellow-500"></i>
                            <h1 class="font-bold text-sm lg:text-base top_naranja">Dirección</h1>
                            <p class="text-xs lg:text-base">Calle Cantuarias 140, T-48 </p>
                            <p class="text-xs lg:text-base">Miraflores.</p>
                        </div>
                    </div>
                    <div class="border-gray-500 border-b-2 border-opacity-10 py-4">
                        <div>
                            <i class="fas fa-mobile-alt font-24"></i>
                            <h1 class="font-bold text-sm lg:text-base top_naranja">Celular</h1>
                            <p class="text-xs lg:text-base">962 755 078</p>
                        </div>
                    </div>
                    <div class=" border-r-2 border-gray-500 border-opacity-10 py-4">
                        <div>
                            <i class="fa-solid fa-clock text-blue-600"></i>
                            <h1 class="font-bold text-sm lg:text-base top_naranja">Horario de atención</h1>
                            <p class="text-xs lg:text-base">L-V de 9:00 a 19:00 </p>
                            <p class="text-xs lg:text-base">Sábados de 8:00 a 14:00 </p>
                        </div>
                    </div>
                    <div class="py-4">
                        <div>
                            <i class="fa-regular fa-envelope text-red-600"></i>
                            <h1 class="font-bold text-sm lg:text-base top_naranja">Email</h1>
                            <p class="text-xs lg:text-base">ventas@topnain.com</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="mapa_contacto px-2 md:px-8 ">
        <iframe class="img_prodct_Detalle"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3900.8566467419205!2d-77.03041098457459!3d-12.121959346605788!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9105c81979aa3bff%3A0xa6c67f89815ea954!2sC.%20Cantuarias%20140%2C%20Miraflores%2015074!5e0!3m2!1ses!2spe!4v1670627228436!5m2!1ses!2spe"
            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    
    @if (session('info'))
        <script>
            alert("{{ session('info') }}")
        </script>
    @endif

        @push('script')
        
        @endpush

</x-app-layout>
