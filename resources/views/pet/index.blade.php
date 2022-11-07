<x-app-layout>

    <div class="container py-10">
        <p class="text-center font-semibold uppercase text-2xl">Mis mascotas</p>
    </div>

    <div class="container pb-10">
        <div class="grid grid-cols-3 gap-11">
            <div class="rounded-md shadow-md w-full border-2 border-gray-200 border-opacity-10 pb-6">
                <div class="flex justify-center mt-8 mx-16">
                    <img src="{{asset('imgz/pet/coquer.jpg')}}" class="object-cover object-center w-full " alt="">
                </div>
                <div class="mt-8 ml-16">
                    <p class="font-medium">Nombre:<span class="font-normal"> Princesa</span> </p>
                    <p class="font-medium">Edad:<span class="font-normal"> 7 años</span> </p>
                    <p class="font-medium">Raza:<span class="font-normal"> Coquer</span> </p>
                </div>
                <div class="mt-8 mx-16 flex justify-end">
                    <a class="text-white ml-2 underline py-2 px-3 font-semibold bg-orange-300 rounded-lg  hover:bg-white hover:px-3 hover:py-2 hover:text-orange-500"
                                href="{{route('pet.show')}}">Ver historial</a>
                </div>
            </div>
            <div class="rounded-md shadow-md w-full border-2 border-gray-200 border-opacity-10 pb-6">
                <div class="flex justify-center mt-8 mx-16">
                    <img src="{{asset('imgz/pet/pitbull.jpg')}}" class="object-cover object-center w-full h-56" alt="">
                </div>
                <div class="mt-8 ml-16">
                    <p class="font-medium">Nombre:<span class="font-normal"> Belleza</span> </p>
                    <p class="font-medium">Edad:<span class="font-normal">13 años</span> </p>
                    <p class="font-medium">Raza:<span class="font-normal"> Pitbull</span> </p>
                </div>
                <div class="mt-8 mx-16 flex justify-end">
                    <a class="text-white ml-2 underline py-2 px-3 font-semibold bg-orange-300 rounded-lg  hover:bg-white hover:px-3 hover:py-2 hover:text-orange-500"
                                href="#">Ver historial</a>
                </div>
            </div>
            <div class="rounded-md shadow-md w-full border-2 border-gray-200 border-opacity-10 pb-6">
                <div class="flex justify-center mt-8 mx-16">
                    <img src="{{asset('imgz/pet/gato.jpg')}}" class="object-cover object-center w-full " alt="">
                </div>
                <div class="mt-8 ml-16">
                    <p class="font-medium">Nombre:<span class="font-normal"> Garfield</span> </p>
                    <p class="font-medium">Edad:<span class="font-normal"> 4 años</span> </p>
                    <p class="font-medium">Raza:<span class="font-normal"> Holandes</span> </p>
                </div>
                <div class="mt-8 mx-16 flex justify-end">
                    <a class="text-white ml-2 underline py-2 px-3 font-semibold bg-orange-300 rounded-lg  hover:bg-white hover:px-3 hover:py-2 hover:text-orange-500"
                                href="#">Ver historial</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>