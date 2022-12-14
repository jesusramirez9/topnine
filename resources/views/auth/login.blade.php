<x-app-layout>
    <x-guest-layout>
        <x-jet-authentication-card>
            <x-slot name="logo">
                {{-- <x-jet-authentication-card-logo /> --}}
            </x-slot>



            <div class="grid grid-cols-1 md:grid-cols-2 gap-2 lg:gap-10">
                <div class="alselcent">
                    <div class="flex items-center justify-center text-center pb-6 ">
                        <x-jet-authentication-card-logo />
                    </div>

                    <div class="flex items-center justify-center text-center pb-6 ">
                      
                        <div>
                            <p class="text-lg font-bold">Inicia sesión</p>
                        </div>

                    </div>
                    <x-jet-validation-errors class="my-4" />
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="mt-4 mb-4">
                        <a href="{{ url('login-google') }}" class="loginGoogle">
                            <div class="p-3 mr-2 bg-white"><img src="{{asset('images/icon_google.png')}}" alt="Google" width="20px"></div>
                            <p class="mb-0">Continuar con Google</p>
                        </a>
                    </div>
                    {{-- <div class="mb-4">
                        <a href="{{ url('login-google') }}" class="loginFacebook">
                            <div class="p-3 mr-2 bg-white"><img src="{{asset('images/icon_facebook.png')}}" alt="Facebook" width="20px"></div>
                            <p class="mb-0">Continuar con Facebook</p>
                        </a>
                    </div> --}}

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div>
                            {{-- <x-jet-label for="email" value="{{ __('Email') }}" /> --}}
                            <x-jet-input id="email" class="block mt-1 w-full " placeholder="Correo electrónico"
                                type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="mt-4">
                            {{-- <x-jet-label for="password" value="{{ __('Password') }}" /> --}}
                            <x-jet-input id="password" class="block mt-1 w-full " placeholder="Contraseña"
                                type="password" name="password" required autocomplete="current-password" />
                        </div>

                        <div class="flex items-center justify-between mt-4">
                            <div class="">
                                <label for="remember_me" class="flex items-center">
                                    <x-jet-checkbox id="remember_me" name="remember" />
                                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>
                            <div class="text-right">
                                @if (Route::has('password.request'))
                                    <a class="underline text-xs text-gray-600 hover:text-gray-900"
                                        href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="mt-4 items-center text-center">
                            <x-jet-button class="d-blck w-full text-center ">
                                {{ __('Log in') }}
                            </x-jet-button>
                        </div>
                    </form>
                    <div class="flex mt-4 text-center top_naranja">
                        <p class="text-sm text-left">¿Aún no tienes una cuenta?</p>
                        <a href="{{ route('register') }}"
                            class="text-sm md:text-base ml-2 underline  font-bold">Regístrate</a>
                    </div>
                </div>
                <div class="jtifyend  imgdsply">
                    <img src="{{ asset('images/login_user/fondo.png') }}" width="w-full" alt="">
                </div>
            </div>



        </x-jet-authentication-card>
    </x-guest-layout>
</x-app-layout>
