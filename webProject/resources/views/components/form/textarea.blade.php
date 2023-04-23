@props(['name','id'])
<div class="form-group">
    <label for="exampleInputEmail1"> {{$name}} </label>
    <textarea class="form-control" name={{$name}}
              placeholder="Offer {{$name}}" required >
    </textarea>
    <small id="{{$id}}" class="form-text text-danger"></small>
</div>
