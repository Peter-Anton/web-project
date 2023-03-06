@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="alert alert-success" id="success_msg" style="display: none;">
      the offer has been saved successfully
        </div>

        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md">
                    Add your offer
                </div>
                @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                @endif

                <br>
                <form method="POST" id="offerForm" action="" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">choose photo</label>
                        <input type="file" id="file" class="form-control" name="photo">
                        <small id="photo_error" class="form-text text-danger"></small>
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1"> Name </label>
                        <input type="text" class="form-control" name="name"
                               placeholder="Offer Name">
                        <small id="name_error" class="form-text text-danger"></small>
                    </div>



                    <div class="form-group">
                        <label for="exampleInputPassword1">Offer Price</label>
                        <input type="text" class="form-control" name="price"
                               placeholder="Offer Price">
                        <small id="price_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1">Offer description </label>
                        <input type="text" class="form-control" name="description"
                               placeholder="Offer description">
                        <small id="details_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"> category_id </label>
                        <input type="text" class="form-control" name="offer_category_id"
                               placeholder="offer_category_id">
                        <small id="category_error" class="form-text text-danger"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1"> company_id </label>
                        <input type="text" class="form-control" name="offer_company_id"
                               placeholder="offer_company_id">
                        <small id="company_error" class="form-text text-danger"></small>
                    </div>

                    <button id="save_offer" class="btn btn-primary">Save Offer</button>
                </form>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).on('click', '#save_offer', function (e) {
            e.preventDefault();
            $('#photo_error').text('');
            $('#name_error').text('');
            $('#price_error').text('');
            $('#details_error').text('');
            $('#success_msg').hide();
            $('#category_error').text('');
            $('#company_error').text('');

            var formData = new FormData($('#offerForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "{{route('offers.store')}}",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function (data) {

                    if (data.status === true) {
                        $('#success_msg').show();
                    }


                }, error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });

    </script>
@stop

