@extends('layouts.app')
@section('content')
   <div class="ml-4 mt-lg-3 mb-lg-2 mr-4  border max-w-10 border-black-400 p-9 rounded-sm " style="background:white" >
    <div class=" row-cols-m-4 ">
        <div class="alert alert-success" id="success_msg" style="display: none;">
      the offer has been saved successfully
        </div>
        <div class="flex-center position-ref full-height">
            <div class="content">
                <div class="title m-b-md align-content-xl-center">
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
{{--                        <label for="exampleInputPassword1"> category_id </label>--}}
                        @php
                            $categories = \App\Models\Category::all();
                        @endphp
                        <div>
                            <label for="category" >category
                            </label>
                        </div>
                        <select  name="category_id" id="category">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        <small id="category_error" class="form-text text-danger"></small>
                    </div>


                    <div class="form-group">
                        <div>
                            <label for="exampleInputPassword1"> company_id </label>

                        </div>
                        @php
                            $companies = \App\Models\Company::all();
                        @endphp
                        <select  name="company_id" id="company">
                            @foreach($companies as $company)
                                <option  value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                        <small id="company_error" class="form-text text-danger"></small>
                    </div>

                    <button id="save_offer" class="btn btn-primary">Save Offer</button>
                </form>
            </div>
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

