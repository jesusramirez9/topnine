<x-app-layout>
    <div class="bg-gray-100">
        <div class="container  pt-6 md:pt-14 pb-14 ">
            <figure class="mb-4">
                <img class="w-full h-80 object-cover object-center" src="{{ Storage::url($category->image) }}" alt="">
            </figure>

            @livewire('category-filter', ['category' => $category])
        </div>
    </div>
</x-app-layout>
