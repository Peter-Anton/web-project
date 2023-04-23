<x-layouts.layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto bg-gray-100 border-gray-200 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register</h1>
            <form method="post" action="{{ route('register') }}" class="mt-10">
                @csrf
                <div class="mb-6">
                    <label class="block mb-6 text-uppercase font-bold text-xs text-gray-700" for="name">
                        username
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="name"
                           id="name"
                           required
                    >
                    @error('name')
                        <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-6 text-uppercase font-bold text-xs text-gray-700" for="email">
                        email
                        @if(session()->has('success'))
                            <p>
                                {{session->get('success')}}
                            </p>
                        @endif
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="email"
                           name="email"
                           id="email"
                           required
                    >
                    @error('email')
                    <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label class="block mb-6 text-uppercase font-bold text-xs text-gray-700" for="password">
                        password
                    </label>
                    @if(session()->has('success'))
                        <p>
                            {{session->get('success')}}
                        </p>
                    @endif
                    <input class="border border-gray-400 p-2 w-full"
                           type="password"
                           name="password"
                           id="password"
                           required
                    >
                </div>
                @error('password')
                <p class="text-red-600 text-xs mt-2">{{ $message }}</p>
                @enderror
                <div class="mb-6">
                    <button type="submit" class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">
                        Register
                    </button>
                </div>
            </form>
        </main>
    </section>
</x-layouts.layout>
