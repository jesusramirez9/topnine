@props(['id' => null, 'maxWidth' => null])

<x-intro-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="">
            {{ $content }}
        </div>
    </div>

    <div class="">
        {{ $footer }}
    </div>
</x-intro-modal>
