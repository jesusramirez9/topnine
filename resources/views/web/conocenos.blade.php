<x-app-layout>

    <div class="container ">
        <div>
            @livewire('navigation-responsive')
        </div>
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-12 py-6 xl:pt-20 mx-6 md:mx-0 ">
            <div class="text-justify">
                <h1 class="text-2xl font-bold ">¿Quiénes somos?</h1>
                <p class="mb-8 mt-2">
                    Somos <span class="font-bold tracking-wider">TOPNAIN</span>, una empresa concebida con el propósito de dar la facilidad a la pequeña y mediana empresa de poder empezar y crecer en su negocio contando con una gran variedad de productos  con precios al por mayor por la compra de pocas unidades. 
                </p>
                <p class="mb-8 mt-2 space-">Desde nuestra plataforma virtual podrás abastecer tu negocio o adquirir ese artículo que necesitas o siempre quisiste al mejor precio, teniendo acceso a todo nuestro catálogo de productos, cotizar y realizar compras de manera sencilla, didáctica y segura, con la confiabilidad que nos caracteriza sin salir de casa.</p>
                <p class="mb-8 mt-2">Así también ofrecemos servicios competitivos y variados que complementan a nuestra tienda.</p>
                

                <h1 class="text-2xl font-bold ">Nuestra Visión</h1>
                <p class="mb-8 mt-2">Consolidar la marca como una tienda por departamento de productos importados, expandiendo nuestra red de locales en diversas regiones del país, siendo referentes en sistema de abastecimiento para nuevos negocios.</p>
                <h1 class="text-2xl font-bold ">Nuestra Misión</h1>
                <p>Brindar la oportunidad a nuevos emprendedores de obtener productos importados a un menor precio para iniciar su negocio adquiriendo productos al por mayor.
                </p>
            </div>
            <div>
                <img src="{{ asset('img/nosotros/nos32.jpg') }}" class="w-full h-full  object-cover object-center" alt="">
            </div>
        </div>
    </div>
  


</x-app-layout>
