@props(['name','id'])
<div class="form-group border border-gray-200 p-3 w-full rounded">
    <label for="exampleInputEmail1"> {{$name}} </label>
    <textarea class="form-control " name={{$name}}
              placeholder="Offer {{$name}}"
    {{$attributes(['value'=>old($name)])}}
    required >
    </textarea>
    <small id="{{$id}}" class="form-text text-danger"></small>
</div>
