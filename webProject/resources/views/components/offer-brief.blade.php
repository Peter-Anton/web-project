<x-layout>
<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">

    <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
        <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
            <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                <img src="/images/laracast/illustration-1.png" alt="" class="rounded-xl">

                <p class="mt-4 block text-gray-400 text-xs">
                    Published
                    <time>{{$brief->created_at->diffForHumans()}}</time>
                </p>

                <div class="flex items-center lg:justify-center text-sm mt-4">
                    <img src="/images/laracast/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 text-left">
                        <h5 class="font-bold">{{$offers->name}}</h5>

                    </div>
                </div>
            </div>

            <div class="col-span-8">
                <div class="hidden lg:flex justify-between mb-6">
                    <a href="/"
                       class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                        <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                            <g fill="none" fill-rule="evenodd">
                                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                </path>
                                <path class="fill-current"
                                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                </path>
                            </g>
                        </svg>
                        Back to Posts
                    </a>

                </div>

                <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                       {{$offers->name}}
{{-- di mh shaghala                   --}}
                </h1>

                <div class="space-y-4 lg:text-lg leading-loose">
                  {!! $brief->body !!}
                </div>
            </div>
        </article>
    </main>
</section>
<section class="col-span-8 col-start-5 mt-10">
    <article class= "flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
        <div >
            <img src="https://i.pravatar.cc/60" alt="" width="60" height="60">
        </div>
        <div>
            <header>
                <h3 class="font-bold">
                    <p class="text-xs">
                        posted
                        <time> 8 min ago</time>
                    </p>
                </h3>
                hello there all my friends
            </header>
        </div>

    </article>
</section>
</body>
</x-layout>