<x-dropdown>
    <x-slot name="trigger">
        <button
            class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{isset($current_category) ? ucwords($current_category->name) : 'Categories'}}
            <x-icon name="drop" class="absolute pointer-event-none" style="right: 12px;"></x-icon>
        </button>
    </x-slot>
    <x-dropdown-items href="/?{{http_build_query(request()->except('category','page'))}}"
                      :active="request()->routeIs('home')">All
    </x-dropdown-items>
    @foreach($categories as $category)
        <x-dropdown-items :active="request()->is('*'.$category->slug)"
                          href="/?category= {{$category->slug}}&{{http_build_query(request()->except('category','page'))}}">
            {{$category->name}}
        </x-dropdown-items>
    @endforeach
</x-dropdown>
