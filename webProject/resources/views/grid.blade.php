<x-layout>
    <x-header />
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <x-main-artical :offers="$offers[0]" />
        <div class="lg:grid lg:grid-cols-2">
           <x-artical :offers="$offers[1]" />
            <x-artical />
        </div>
        <div class="lg:grid lg:grid-cols-3">
        <x-artical />
        <x-artical />
        <x-artical />
        </div>
    </main>
</x-layout>
