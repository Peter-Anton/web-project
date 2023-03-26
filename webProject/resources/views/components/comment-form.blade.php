@props(['brief'])
<x-panel>
    <form action="/brief/{{$brief->slug}}/comment" method="post">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{auth()->id()}}" alt="" width="40" height="40" class="rounded-full">
            <h3>Add a comment</h3>
        </header>
        <div class="mt-5">
            <label for="comment"></label>
            <textarea name="comment" id="comment" cols="30" rows="5"
                      class="w-full text-sm focus:outline-none focus:ring"
                      placeholder=" write your comment here" ></textarea>
            @error('comment')
            <span class="text-red text-xs">
            {{$message}}
            </span>
            @enderror
        </div>
        <div class="mt-5 justify-content-end ">
            <button type="submit"
                    class="bg-blue-500 text-white uppercase font-semibold text-xs py-2 px-10 rounded-2xl hover:bg-blue-600">
                Submit
            </button>
        </div>
    </form>
</x-panel>
