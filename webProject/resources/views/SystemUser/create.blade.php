@extends('components.layouts.app')
@section('content')
    <div class="ml-4 mt-lg-3 mb-lg-2 mr-4  border max-w-10 border-black-400 p-9 rounded-sm " style="background:white">
        <div class=" row-cols-m-4 ">
            <div class="alert alert-success" id="success_msg" style="display: none;">
                the new admin has been saved successfully
            </div>
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md align-content-xl-center">
                        Add your new admin
                    </div>
                    @if(Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    <br>

                    <form method="POST" id="AdminForm" action="" enctype="multipart/form-data">
                        @csrf

                        <x-form.input name="name" id="name_error"/>
                        <x-form.input name="email" id="email_error"/>
                        <x-form.input name="password" id="password_error"/>

                        <button id="save_admin" class="btn btn-primary">Save admin</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).on('click', '#save_admin', function (e) {
            e.preventDefault();
            $('#photo_error').text('');
            $('#name_error').text('');
            $('#price_error').text('');
            $('#details_error').text('');
            $('#success_msg').hide();
            $('#category_error').text('');
            $('#company_error').text('');

            var formData = new FormData($('#AdminForm')[0]);
            $.ajax({
                type: 'post',
                enctype: 'multipart/form-data',
                url: "/admin/store",
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

