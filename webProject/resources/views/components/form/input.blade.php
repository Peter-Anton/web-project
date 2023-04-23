@props(['name','type'=>'text','id'])
<div class="form-group">
    <label for="exampleInputEmail1"> {{$name}} </label>
    <input type="{{$type}}" class="form-control" name={{$name}}
           placeholder="Offer {{$name}}" {{$attributes}}
    >
    <small id="{{$id}}" class="form-text text-danger"></small>
</div>
