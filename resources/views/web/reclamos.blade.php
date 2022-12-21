<x-app-layout>

    <div class="container ">
        <div>
            @livewire('navigation-responsive')
        </div>
    </div>

    <div class="container py-6 xl:pb-20">
        <p class="text-center  px-4 lg:px-0 font-semibold">¿Quieres presentar tu reclamo o requerimiento por correo
            electrónico? <br>
            Lee los siguientes pasos:</p>
        <hr class="my-6 bg-black">
        <ul class="text-justify  px-4 lg:px-0">
            <li class="flex  items-start"><span class="top_naranja font-semibold mr-2">01.</span>
                <p>Descarga el archivo excel</p> <a href="{{ asset('catalogo/reclamaciones.xls') }}"
                    class="ml-4 font-semibold text-blue-600 hover:text-blue-500"
                    download="LibroDeReclamaciones">Descargar</a>
            </li>
            <li class="flex mt-2 items-start"><span class="top_naranja font-semibold mr-2">02.</span>
                <p>Guarda el archivo descargado en tu computadora.</p>
            </li>
            <li class="flex mt-2 items-start"><span class="top_naranja font-semibold mr-2">03.</span>
                <p>Completa todos los campos obligatorios del formulario.</p>
            </li>
            <li class="flex mt-2 items-start"><span class="top_naranja font-semibold mr-2">04.</span>
                <p> Una vez finalizado, guarda el archivo y envíanos tu reclamo a nuestro correo: <br> <span
                        class="top_naranja font-semibold"> reportes@topnain.pe</span>. Al momento de adjuntar el archivo
                    excel, deberás colocar <span class="top_naranja font-semibold"> "RECLAMO"</span> o <span
                        class="top_naranja font-semibold">"REQUERIMIENTO"</span> (Depende de tu situación) <br> - <span
                        class="top_naranja font-semibold"> NOMBRES Y APELLIDOS.</span></p>
            </li>
            <li class="flex mt-2 items-start"><span class="top_naranja font-semibold mr-2">05.</span>
                <p>De conformidad y en cumplimiento del <span class="top_naranja font-semibold">D.S. 011-2011 PCM</span>
                    , el plazo de atención del reclamo es de <span class="top_naranja font-semibold">30 días</span>
                    calendario desde su presentación, el cual podrá extenderse excepcionalmente de acuerdo a la
                    complejidad del requerimiento.</p>
            </li>
            <li class="flex mt-2 items-start"><span class="top_naranja font-semibold mr-2">06.</span> Nos comunicaremos
                contigo para confirmar la recepción de tu reclamo.</li>

        </ul>
    </div>

    <div class="container">
        <div class="border-2 border-orange-500">
            <div class="p-6">
                <p class="top_naranja font-semibold">Importante</p>
                <p class="mt-2">
                    Sergio Muñoz, con RUC 10468770771, propietario de la marca TOPNAIN, con dirección Calle cantuarias
                    140, T-48 - Miraflores - Perú.
                </p>
                <p class="mt-2"> <span class="top_naranja font-semibold">RECLAMO:</span> Disconformidad relacionada a los productos o
                    servicios.</p>
                <p class="mt-2"> <span class="top_naranja font-semibold">QUEJA:</span> Disconformidad no relacionada a los productos
                    o servicios o malestar o descontento respecto a la atención a los clientes.</p>
                <p class="mt-2">La formulación del reclamo no impide acudir a otras vías de solución de controversias ni es requisito
                    previo para interponer una denuncia ante el INDECOPI.</p>
            </div>
        </div>

    </div>

</x-app-layout>
