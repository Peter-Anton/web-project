@extends('components.layouts.app')
@section('content')
    <div class="ml-4 mt-lg-3 mb-lg-2 mr-4  border max-w-10 border-black-400 p-9 rounded-sm " style="background:white">
        <div class=" row-cols-m-4 ">
            <div class="alert alert-success" id="success_msg" style="display: none;">
                the offer has been edit successfully
            </div>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <h3 class="title m-b-md align-content-xl-center">
                        Edit your offer:{{$offer->name}}
                    </h3>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    <br>
                    <form method="POST" id="offerForm" action="" enctype="multipart/form-data">
                        @csrf
                        <x-form.input name="name" id="name_error" :value="old('name',$offer->name)"/>
                        <div class="flex mt-6">
                            <div class="flex-1">
                                <x-form.input name="photo" id="photo_error" type="file"/>
                            </div>
                            <img src="{{ asset('storage/' . $offer->photo) }}" alt="" class="rounded-xl ml-6  col-md-7" width="300">
                        </div>
                        <x-form.input name="price" id="price_error" :value="old('price',$offer->price)"/>
                        <x-form.input name="description" id="description_error"
                                      :value="old('description',$offer->description)"/>
                        <x-form.textarea name="excrept" id="excrept_error" :value="old('excerpt',$brief->excerpt)"/>
                                                <div class="form-group">
                                                    @php
                                                        $categories = \App\Models\Category::all();
                                                    @endphp
                                                    <div>
                                                        <label for="category">category
                                                        </label>
                                                    </div>
                                                    <select name="category_id" id="category">
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
                                                    <select name="company_id" id="company">
                                                        @foreach($companies as $company)
                                                            <option value="{{$company->id}}">{{$company->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <small id="company_error" class="form-text text-danger"></small>
                                                </div>

                        <button id="save_offer" class="btn btn-primary">edit Offer</button>
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


                },
                error: function (reject) {
                    var response = $.parseJSON(reject.responseText);
                    $.each(response.errors, function (key, val) {
                        $("#" + key + "_error").text(val[0]);
                    });
                }
            });
        });

    </script>
@stop

