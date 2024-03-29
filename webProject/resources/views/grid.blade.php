<x-layouts.layout>
    @include('components.header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($offers->count())
            <x-offer-grid :offers="$offers"></x-offer-grid>
        @else
            <p class="text-center">No offers yet. Please check back later.</p>
        @endif
    </main>
</x-layouts.layout>
