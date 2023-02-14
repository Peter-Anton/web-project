@extends('layouts.app')
@section('content')

    <div class="alert alert-success" id="success_msg" style="display: none;">
        the item has been delete successfully
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">details</th>
            <th scope="col">picture</th>
            <th scope="col">operation</th>
        </tr>
        </thead>
        <tbody>


        @foreach($offers as $offer)


            <tr class="offerRow{{$offer -> id}}">
                <th scope="row">{{$offer -> id}}</th>
                <td>{{$offer -> name}}</td>
                <td>{{$offer -> price}}</td>
                <td>{{$offer -> description}}</td>
                <td><img  style="width: 120px; height: 120px;" src="{{asset('images/offers/'.$offer->photo)}}" alt=""></td>
                <td>
                    <a href="#" offer_id="{{$offer -> id}}"    class="delete_btn1 btn btn-danger"> delete</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>

@stop
@section('scripts')
    <script>
        $(document).on('click', '.delete_btn1', function (e) {
            e.preventDefault();
            let offer_id = $(this).attr('offer_id');
            $.ajax({
                type: 'post',
                url: "{{route('offers.delete')}}",
                data: {
                    '_token': "{{csrf_token()}}",
                    'id' :offer_id
                },
                success: function (data) {

                    if(data.status === true){
                        $('#success_msg').show();
                    }
                    $('.offerRow'+data.id).remove();
                }, error: function (reject) {

                }
            });
        });
    </script>
@stop
