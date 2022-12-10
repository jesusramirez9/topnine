<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="flex pt-8 text-xs">
        <a href="{{ route('home') }}"
            class="mx-6  font-normal  hover:underline  md:hidden  {{ request()->is('/') ? 'active underline text-gray-800 font-semibold   ' : '' }}">
            Inicio
        </a>
        <a href="{{ route('conocenos') }}"
            class="mx-6  font-normal  hover:underline  md:hidden  {{ request()->is('conocenos') ? 'active underline text-gray-800 font-semibold ' : '' }}">
            Conócenos
        </a>
        <a href="{{ route('servicios') }}"
            class="mx-6  font-normal  hover:underline   md:hidden  {{ request()->is('servicios') ? 'active underline text-gray-800 font-semibold ' : '' }}">
            Servicios
        </a>
        <a href="{{ route('contacto') }}"
            class="mx-6  font-normal  hover:underline   md:hidden  {{ request()->is('contactanos') ? 'active underline text-gray-800 font-semibold' : '' }}">
            Contáctanos
        </a>
    </div>
</div>
