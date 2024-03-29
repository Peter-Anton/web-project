@props(['offer'])
<article
   {{$attributes->merge(['class'=>'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl'])}} >
    <div class="py-8 px-30 lg:flex">
        <div class="flex-1 lg:mr-1 ">
            <img src="{{asset('storage/'.$offer->photo)}}"
                 alt="Blog Post illustration"
                 class="rounded-xl w-400 h-200 "
            >
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
                <div class="flex mr-10 items-center text-sm">
                    <img src="/images/laracast/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-25">

                        <h5 class="font-bold ">
                            <a href="/?company={{$offer->company->name}}">{{$offer->company->name}}
                            </a>
                        </h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/brief/{{$offer->brief->slug}}"
                       class="mt-20 transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Read more </a>
                </div>
            </footer>
        </div>
    </div>
</article>
