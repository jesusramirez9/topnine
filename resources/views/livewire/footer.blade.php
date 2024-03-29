<footer class="border-2 border-gray-400 border-opacity-20 border-t-2 mt-14 pt-6 bg_griss_top text-white">
    <a href="https://wa.me/51962755078" target="_blank" class="wsp-icon">
	    <img src="{{asset('img/wsptop.png')}}" class="w-full md:h-16 img_wsp" alt="">
    </a>
    <div class="max-w-8xl mx-auto px-2  grid grid-cols-1 md:grid-cols-4 lg:grid-cols-5 gap-6 md:gap-16">
        <div>
            <div class="mb-6 flex justify-center md:justify-start md:block">
                {{-- <x-jet-application-mark class="block h-10 md:h-16 w-auto" /> --}}
                <img src="{{asset('img/logo/logo1.png')}}" class="block h-8 "alt="">
            </div>
            <div class=" mb-6 justify-center md:justify-start md:block">
                <div class="flex justify-center md:justify-start">
                    <p class="font-bold">SÍGUENOS EN</p> <br>
                </div>
                <div class="flex justify-center md:justify-start mt-3 md:mt-0">
                    <a href="https://www.facebook.com/profile.php?id=100088314324658" target="_blank" class="mr-2">
                        <i class="fa-brands fa-facebook-f "></i></a>
                    <a href="https://www.instagram.com/topnain/" target="_blank" class="mx-2">
                        <i class="fa-brands fa-instagram "></i>
                    </a>
                    <a href="https://www.youtube.com/@topnaintienda/featured" target="_blank" class="mx-2">
                        <i class="fa-brands fa-youtube "></i>
                    </a>
                    <a href="https://www.tiktok.com/@topnain.tienda" target="_blank" class="ml-2">
                        <i class="fa-brands fa-tiktok "></i>
                    </a>
                </div>
            </div>
            <div class="grid grid-cols-3 lg:grid-cols-4  gap-3 mx-6 md:mx-0">
                <div>
                    <img src="{{ asset('img/iconos/mastercard.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('img/iconos/exprexx.jpg') }}" alt="">
                </div>
                <div>
                    <img src="{{ asset('img/iconos/visa.jpg') }}" alt="">
                </div>

            </div>
        </div>
        <div>
            <p class="text-sm font-bold mb-3 text-center md:text-left">CONTACTO</p>
            <div class="flex justify-center md:block">
                <ul class="text-xs ulli ">
                    <li><i class="fas fa-map-marker-alt mr-2"></i>Calle cantuarias 140, semisotano, puesto 48.</li>
                    <li><i class="fas fa-mobile-alt color-icon-footer mr-2"></i> 962 755 078 </li>
                    <li><i class="far fa-envelope color-icon-footer mr-2"></i>ventas@topnain.com</li>
                </ul>
            </div>
        </div>
        <div>
            <p class="text-sm font-bold mb-3 text-center md:text-left">POLITICAS</p>
            <div class="flex justify-center md:block">
                <ul class="text-xs ulli ">
                    <li><a href="{{ route('politicas') }}">Políticas de privacidad</a> </li>
                    <li><a href="{{ route('terminos') }}"> Términos y condiciones</a></li>
                   
                    
                </ul>
            </div>
        </div>
        <div>
            <p class="text-sm font-bold mb-3 text-center md:text-left">Reclamos</p>
            <div class="flex justify-center md:block">
                <ul class="text-xs ulli ">
                    <li><a href="{{route('reclamos')}}">Libro de reclamaciones</a></li>
                </ul>
            </div>
        </div>
        <div>
            <p class="text-sm font-bold mb-3 text-center md:text-left">VENTA CORPORATIVA</p>
            <div class="flex justify-center md:block">
                <ul class="text-xs ulli ">
                    <li><i class="fas fa-mobile-alt color-icon-footer mr-2"></i> 962 755 078 </li>
                    <li><i class="far fa-envelope color-icon-footer mr-2"></i>ventas@topnain.com</li>
                    <li><i class="fas fa-map-marker-alt mr-2"></i>Calle cantuarias 140, semisotano, puesto 48.</li>

                </ul>
            </div>
        </div>
    </div>

    <div class="bg-gray-200 border-t-2 text-white py-2 mt-8">
        <div class="flex justify-center text-gray-600">
            <p>Copyright © 2022 | <span class=" "> Toptain  </span></p>
        </div>
    </div>

</footer>
