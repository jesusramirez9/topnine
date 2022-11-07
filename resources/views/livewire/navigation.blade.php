<div>
    <div class="flex justify-center items-center bg_orange text-white font-semibold">
        <div class=" grid grid-cols-1 md:py-3 text-sm gap-4 text-center md:flex items-center">
                    <div class="mr-4">
                        <p><i class="far fa-envelope mr-4"></i>ventas@trepstom.com</p>
                    </div>
                    <div class="mr-4 hidden md:block border-r-2 border-l-2 border-x-white">
                        <p class="px-4"><i class="fab fa-whatsapp mr-4"></i>998 905 385</p>
                    </div>
                    <div class="mr-4 hidden md:block">
                        <p><i class="fas fa-map-marker-alt  mr-4"></i>Direccion Trepstom</p>
                    </div>
        </div>
    </div>
    <div class="bg-white text-gray-700 py-2 md:py-5 hidden md:block">
        <div class=" flex items-center container  justify-between">
            <a href="/" class="">
                <x-jet-application-mark class="block h-10 md:h-16 w-auto" />
            </a>
             
            <div class="flex-1 mx-8 justify-center">
                {{--  --}}
                <div class="text-black hidden md:block">
                    @livewire('search')
                </div>
            </div>

            <div>
                <div class="flex items-center">
                    <div class="hidden md:block">
                        @auth
                            <x-jet-dropdown align="right" width="48">
                                <x-slot name="trigger">

                                    <button
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="h-8 w-8 rounded-full object-cover"
                                            src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->name }}" />
                                    </button>

                                </x-slot>

                                <x-slot name="content">
                                    <!-- Account Management -->
                                    <div class="block px-4 py-2 text-xs text-gray-400">
                                        {{ __('Manage Account') }}
                                    </div>

                                    <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                        {{ __('Profile') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('orders.index') }}">
                                        Mis ordenes
                                    </x-jet-dropdown-link>
                                    {{-- <x-jet-dropdown-link href="{{ route('pet.index') }}">
                                        Mis mascotas
                                    </x-jet-dropdown-link> --}}

                                    @role('admin')
                                        <x-jet-dropdown-link href="{{ route('admin.index') }}">
                                            Administrador
                                        </x-jet-dropdown-link>
                                    @endrole

                                    <div class="border-t border-gray-100"></div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                                                    this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-jet-dropdown>
                        @else
                            <x-jet-dropdown align="right" width="48">

                                <x-slot name="trigger" >
                                    <div class="hover:bg-gray-100 hover:rounded-lg">

                                    
                                    <div class="flex items-center px-2 py-2 rounded-lg">
                                        <div>
                                            <i class="fas fa-user-circle  text-3xl cursor-pointer"></i>
                                        </div>
                                        <p class="ml-2 cursor-pointer">
                                            Iniciar sesión 
                                        </p>

                                    </div>
                                </div>
                                </x-slot>

                                <x-slot name="content">
                                    <x-jet-dropdown-link href="{{ route('login') }}">
                                        {{ __('Login') }}
                                    </x-jet-dropdown-link>

                                    <x-jet-dropdown-link href="{{ route('register') }}">
                                        {{ __('Register') }}
                                    </x-jet-dropdown-link>
                                </x-slot>

                            </x-jet-dropdown>

                        @endauth
                    </div>
                    <div class="mx-4 hidden md:block">
                        @livewire('dropdown-cart')
                    </div>
                </div>

            </div>
        </div>
    </div>
    <header class=" w-full top-0 shadow-xl border-gray-500 border-opacity-20 border-b-2 py-2" style="z-index: 900"
        x-data="dropdown()">
        
        <div class="container flex items-center h-12 justify-between  enlace ">
            <div class="block md:hidden p-4 md:p-0">
                <x-jet-application-mark class="block h-10 md:h-16 w-auto" />
            </div>
         
            <a :class="{ 'bg-opacity-100 text-orange-500': open }" x-on:click="show()"
                class="flex flex-col items-center justify-center order-last md:order-first px-6 md:px-4 bg-white bg-opacity-25  cursor-pointer font-semibold h-full">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>

                <span class="text-sm hidden md:block">Categorías</span>
            </a>
            <div class="flex">
                <a href="/"
                class="mx-6  font-normal hover:underline  hidden lg:block  {{ request()->is('/') ? 'active  ' : '' }}">
                Inicio
            </a>

            <a href="{{ route('conocenos') }}"
                class="mx-6  font-normal  hover:underline  hidden lg:block  {{ request()->is('conocenos') ? 'active     ' : '' }}">
                Conócenos
            </a>
            {{-- <a href="http://127.0.0.1:8000/categories/tours"
                class="mx-6  font-normal hover:underline   hidden md:block  {{ request()->is('categories/*') ? 'active  ' : '' }}">
                Tours
            </a> --}}
            <a href="{{ route('servicios') }}"
                class="mx-6  font-normal  hover:underline  hidden md:block  {{ request()->is('servicios') ? 'active  ' : '' }}">
                Servicios
            </a>
            {{-- <a href="{{ route('noticia.show') }}"
                class="mx-6  font-normal  hover:underline  hidden md:block  {{ request()->is('noticia') ? 'active ' : '' }}">
                Galeria
            </a> --}}
            {{-- <a href="{{ route('ventamayor') }}"
                class="mx-6  font-normal  hover:underline  hidden md:block  {{ request()->is('ventas-al-por-mayor') ? 'active ' : '' }}">
                Tour Privado
            </a> --}}
            {{-- <a href="{{ route('contacto') }}"
                class="mx-6  font-normal  hover:underline  hidden md:block  {{ request()->is('contactanos') ? 'active ' : '' }}">
                Escríbenos
            </a> --}}
            {{-- <a href="{{ route('publicidad') }}"
                class="mx-6  font-normal  hover:underline  hidden md:block  {{ request()->is('publicidad') ? 'active ' : '' }}">
                publicidad
            </a> --}}
            </div>
            <div class="flex">
                <a href="#" class="md:mx-6 hidden md:block">
                    <i class="fa-brands fa-facebook-square fa-2x"></i></a>
                <a href="#" class=" hidden md:block"><img class="w-9 h-9"
                        src="{{ asset('img/iconos/insta.png') }}" alt=""></a>
    
            </div>
         
            {{-- <a href="#" class="md:mx-6">
                <i class="fa-brands fa-facebook-square fa-2x"></i></a>
            <a href="#" class=""><img class="w-9 h-9" src="{{ asset('img/iconos/insta.png') }}"
                    alt=""></a> --}}

        </div>

        <nav id="navigation-menu" :class="{ 'block': open, 'hidden': !open }" x-show="open"
            class="bg-trueGray-700  z-10 bg-opacity-70 w-full absolute hidden">

            {{-- menu mobil --}}
                    
                <div class="container h-96 mt-2">
                    <div x-on:click.away="close()"
                         class="grid grid-cols-4 h-96 relative ">
                         
                         <ul class="bg-white pt-6">
                            @foreach ($categories as $category)
                                <li class="navigation-link text-trueGray-700 hover:font-bold hover:bg-gray-200 hover:text-black">
                                    <a href="{{route('categories.show', $category)}}" class="py-2 px-4 text-sm flex items-center">
        
                                        {{-- <span class="flex justify-center w-9">
                                            {!!$category->icon!!}
                                        </span> --}}
                                        <span class="flex justify-center w-1 bg-orange-500 h-4 mr-2">
                                            
                                        </span>
                                        {{$category->name}}
                                    </a>
        
        
                                    <div class="navigation-submenu bg-gray-100 absolute w-3/4 h-96 top-0 right-0 hidden">
                                        <x-navigation-subcategories :category="$category" />
                                    </div>
        
                                </li>
                            @endforeach
                        </ul>
        
                        <div class="col-span-3 bg-gray-100">
                            <x-navigation-subcategories :category="$categories->first()" />
                        </div>
                    </div>
                </div>

           
        </nav>
    </header>

    @push('script')
    @endpush
</div>
