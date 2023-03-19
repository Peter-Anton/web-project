@props(['offer'])
<article
   {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}} >
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{asset('/images/offers/'.$offer->photo)}}" alt="Blog Post illustration" class="rounded-xl">
        </div>
        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="/?category={{$offer->category->slug}}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{$offer->category->name}}</a>

                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {{$offer->name}}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time> {{$offer->created_at->diffForHumans()}} </time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 space-y-4">
                <p>
                    {{$offer->description}}
                </p>

                <p class="mt-4">
                </p>
            </div>

            <footer class="flex justify-between items-center mt-6">
                <div class="flex items-center text-sm">
                    <img src="/images/laracast/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">

                        <h5 class="font-bold">
                            <a href="/?company={{$offer->company->name}}">{{$offer->company->name}}
                            </a>
                        </h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="#"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
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
</article>
