@props(['comment'])
<section class="col-span-8 col-start-5 mt-10">
<x-panel class="bg-gray-100">
    <article class= "flex space-x-4">
        <div >
            <img src="https://i.pravatar.cc/60?u={{$comment->id}}" alt="" width="60" height="60">
        </div>
        <div>
            <header>
                <h3 class="font-bold">{{$comment->company->name}}</h3>

                    <p class="text-xs">
                        posted
                        <time> {{$comment->created_at->diffForHumans()}}</time>
                    </p>
               {{$comment->comment}}
            </header>
        </div>

    </article>
</x-panel>
</section>
