<!doctype html>
<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/laracast/logo.svg" alt="Laracasts Logo" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center width:max-content">
            @auth
                <x-dropdown>
                    <x-slot name="trigger">
                        <button
                            class="text-xs font-bold uppercase"> {{auth()->user()->name}}</button>
                    </x-slot>
                    @admin
                    <x-dropdown-items href="/admin/create" :active="request()->is('/admin/create')">New offer</x-dropdown-items>
                    <x-dropdown-items href="/admin/all">offers</x-dropdown-items>
                    @endadmin
                    @can('systemUsr')
                        <x-dropdown-items href="/systemUser/all" :active="request()->is('/systemUser/all')"> admins</x-dropdown-items>
                    @endcan
                    <x-dropdown-items href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log out</x-dropdown-items>
                    <form method="POST" action="{{ route('logout') }}" class="hidden" id="logout-form">
                        @csrf
                        <button type="submit" class="text-xs font-bold uppercase text-blue">logout</button>
                    </form>
                </x-dropdown>
                <a href="#newsletter"
                   class="uppercase bg-blue-500  rounded-full text-xs font-semibold text-white py-3 px-5 ml-4">
                    Subscribe for Updates
                </a>

            @else
                <a href="{{ route('register') }}"
                   class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 ">register</a>
                <a href="{{ route('login') }}"
                   class=" ml-6 bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 ">login</a>
            @endauth


        </div>
    </nav>
    @yield('content')
    {{ $slot}}
    <footer id="newsletter"
            class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
        <img src="/images/laracast/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
        <h5 class="text-3xl">Stay in touch with the latest posts</h5>
        <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

        <div class="mt-10">
            <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                <form method="POST" action="/newsletter" class="lg:flex text-sm">
                    @csrf
                    <div class="lg:py-3 lg:px-5 flex items-center">
                        <label for="email"
                               class="hidden lg:inline-block">
                            <img src="/images/laracast/mailbox-icon.svg" alt="mailbox letter">
                        </label>
                        <div>
                            <input id="email"
                                   type="text"
                                   name="email"
                                   placeholder="Your email address"
                                   class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">
                            @error('email')
                            <span class="text-red text-xs">
            {{$message}}
            </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit"
                            class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8"
                    >
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </footer>
    <x-flash/>
</section>
</body>

