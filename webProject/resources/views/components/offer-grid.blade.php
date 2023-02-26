@props(['offers'])
    <x-main-artical :offers="$offers[0]"></x-main-artical>
    @if($offers->count() > 1)
        <div class="lg:grid lg:grid-cols-6">
            @foreach($offers as $offer)
                <x-artical :offer="$offer" class="{{$loop->iteration>3?'col-span-3':'col-span-2'}}"></x-artical>
            @endforeach
            @endif
        </div>
