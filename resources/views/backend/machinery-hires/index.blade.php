@extends('layouts.backend')

@section('page_title')
    Machinery Hire
@endsection

@section('styles')

@endsection

@section('css')

@endsection

@section('header_buttons')
@endsection

@section('content')

    <form method="POST" action="{{ route('backend.machineryHires.store') }}">
        @csrf
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h4 class="card-title">Machinery Hires</h4>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-secondary waves-effect waves-light save-this-form"><i class="mdi mdi-content-save me-1"></i>SAVE</button>
                            </div>
                        </div>


                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 mb-4">
                                <label>Title *</label>
                                <input class="form-control" type="text" id="main-title" name="title" placeholder="Enter here...." value="{{ isset($machinery) ? $machinery->title : '' }}">
                            </div>

                            <div class="col-sm-12 mb-4">
                                <label>Content *</label>
                                <textarea id="content-en" name="body_content">
                                    {{ isset($machinery) ? $machinery->content : '' }}
                                </textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <input type="hidden" id="route_get_slug" value="{{ route('backend.products.slugGenerator') }}">

@endsection


@section('scripts')

    <!--jquery cdn-->
    <script src="{{ asset('assets/backend/packages/code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <!-- ckeditor -->
    <script src="{{ asset('assets/backend/libs/%40ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>

    <!-- croppie -->
    <script src="{{ asset('assets/backend/libs/croppie/croppie.min.js') }}"></script>


@endsection

@section('custom_scripts')
    <script>

        function appendImage($img){

            $image = "{{ url('assets/common/images/uploads') }}/" + $img.filename;

            $item = $('<div></div>').addClass('col-md-6 mb-3').attr('id', $img.id);

            if($img.is_primary == 1){
                $('<div></div>').addClass('d-flex align-items-center justify-content-center img-action')
                    .append($('<img>').addClass('img-fluid img-bordered').attr('src', $image))
                    .append($('<span></span>').addClass('badge bg-success').css({'position' : 'absolute', 'top' : '10px', 'right' : '10px'})
                        .append($('<i></i>').addClass('mdi mdi-key'))
                    ).appendTo($item);
            }
            else{
                $('<div></div>').addClass('d-flex align-items-center justify-content-center img-action img-border')
                    .append($('<img>').addClass('img-fluid img-bordered').attr('src', $image))
                    .append($('<div></div>').addClass('img-overlay-area d-flex justify-content-center align-items-center')
                        .append(
                            $('<a></a>').addClass('btn btn-danger btn-xs me-2 delete-image')
                                .attr('href', 'javascript:void(0);')
                                .attr('data-id', $img.id)
                                .attr('data-toggle', 'tooltip')
                                .attr('data-placement', 'top')
                                .attr('title', 'Delete')
                                .attr('data-original-title', 'Delete')
                                .append($('<i></i>').addClass('mdi mdi-delete'))
                        )
                        .append(
                            $('<a></a>').addClass('btn btn-success btn-xs primary-image')
                                .attr('href', 'javascript:void(0);')
                                .attr('data-id', $img.id)
                                .attr('data-toggle', 'tooltip')
                                .attr('data-placement', 'top')
                                .attr('title', 'Make this Primary Image?')
                                .attr('data-original-title', 'Make this Primary Image?')
                                .append($('<i></i>').addClass('mdi mdi-key'))
                        )
                    ).appendTo($item);
            }

            return $item;
        }

        function priceRow($item){

            $thicknesses = $('<select></select>').addClass('form-control').attr('name', 'product_thickness_id[]');
            $.each($item.thicknesses, function ($index, $d){
                $('<option></option>').attr('value', $d.id).text($d.name).appendTo($thicknesses);
            });

            $labels = $('<select></select>').addClass('form-control').attr('name', 'product_label_id[]');
            $.each($item.labels, function ($index, $d){
                $('<option></option>').attr('value', $d.id).text($d.name).appendTo($labels);
            });


            $el = $('<div></div>').addClass('row justify-content-between mb-4');

            $('<div></div>').addClass('col-sm-4')
                .append($('<label></label>').text('Thickness'))
                .append($thicknesses).appendTo($el);

            $('<div></div>').addClass('col-sm-4')
                .append($('<label></label>').text('Label'))
                .append($labels).appendTo($el);

            $('<div></div>').addClass('col-sm-2')
                .append($('<label></label>').text('Price'))
                .append($('<input>').addClass('form-control text-end').attr('name', 'price[]').attr('type', 'text').attr('placeholder', 'Enter here....').attr('required', 'required')).appendTo($el);

            $('<div></div>').addClass('col-sm-2 d-flex justify-content-end align-items-end')
                .append($('<a></a>').attr('href', 'javascript:void(0);').addClass('btn btn-danger waves-effect waves-light delete-price')
                    .append($('<i></i>').addClass('mdi mdi-delete'))
                ).appendTo($el);

            return $el;
        }

        function thicknessRow($item){

            $thicknesses = $('<select></select>').addClass('form-control').attr('name', 'thickness_ids[]');
            $.each($item.thicknesses, function ($index, $d){
                $('<option></option>').attr('value', $d.id).text($d.name).appendTo($thicknesses);
            });

            $el = $('<div></div>').addClass('row justify-content-between mb-4');

            $('<div></div>').addClass('col-sm-10')
                // .append($('<label></label>').text('Thickness'))
                .append($thicknesses).appendTo($el);

            $('<div></div>').addClass('col-sm-2 d-flex justify-content-end align-items-end')
                .append($('<a></a>').attr('href', 'javascript:void(0);').addClass('btn btn-danger waves-effect waves-light delete-thickness')
                    .append($('<i></i>').addClass('mdi mdi-delete'))
                ).appendTo($el);

            return $el;
        }

        function labelRow($item){

            $labels = $('<select></select>').addClass('form-control').attr('name', 'label_ids[]');
            $.each($item.labels, function ($index, $d){
                $('<option></option>').attr('value', $d.id).text($d.name).appendTo($labels);
            });


            $el = $('<div></div>').addClass('row justify-content-between mb-4');

            $('<div></div>').addClass('col-sm-10')
                // .append($('<label></label>').text('Label'))
                .append($labels).appendTo($el);

            $('<div></div>').addClass('col-sm-2 d-flex justify-content-end align-items-end')
                .append($('<a></a>').attr('href', 'javascript:void(0);').addClass('btn btn-danger waves-effect waves-light delete-label')
                    .append($('<i></i>').addClass('mdi mdi-delete'))
                ).appendTo($el);

            return $el;
        }

        ClassicEditor.create(document.querySelector("#content-en"), {
            toolbar: {
                //removeItems: [ 'insertImage', 'blockQuote', 'link' ],
                items: [
                    'heading', '|', 'bold', 'italic', 'listItem', 'link', '|', 'undo', 'redo'
                ]
            },
        }).then(function (e) {
            e.ui.view.editable.element.style.height = "200px";
        })
            .catch(function (e) {
                console.error(e);
            });



        $image_thumb = $('#thumb_image_demo').croppie({
            enableExif: true,
            viewport: {
                width:210,
                height:280,
                type:'square' //circle
            },
            boundary:{
                width:300,
                height:300
            }
        });

        $('#thumb_image').on('change', function(){
            var reader = new FileReader();
            reader.onload = function (event) {
                $image_thumb.croppie('bind', {
                    url: event.target.result
                });
            };
            reader.readAsDataURL(this.files[0]);
            $('#uploaded_thumb').show();
        });


        $('.thumb_crop').click(function(event){

            $image_thumb.croppie('result', {
                type: 'canvas',
                /*size: 'original'*/
                size: {
                    width: 660,
                    height: 880
                }
            }).then(function(response){

                $id = $('#temp_id').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('backend.products.imageUpload') }}",
                    type: "POST",
                    data: {
                        image:response,
                        id: $id,
                    },
                    success: function ($data) {
                        $('#image-status').html($data.status);
                        $img = appendImage($data);
                        $('#uploaded_image').append($img);
                    }
                });

            })
        });


        $(document).ready(function (){
            $('#main-title').on('blur', function ($e){

                $this = $(this);
                $title = $($this).val();

                $id = $('#temp_id').val();

                $url = $('#route_get_slug').val();

                $isSending = false;
                setTimeout(function (){
                    if(!$isSending){
                        $.ajax({
                            url: $url,
                            dataType: 'json',
                            data: {
                                id: $id,
                                title: $title,
                                _token: csrf_token()
                            },
                            method: 'POST',
                            beforeSend: function ($jqXHR, $obj) {
                                $isSending = true;
                                $('#slug-warning').addClass('d-none');
                            },
                            success: function ($res, $textStatus, $jqXHR) {
                                $isSending = false;
                                $('#slug').val($res.slug);
                                if($res.is_exist == 1){
                                    $('#slug-warning').removeClass('d-none');
                                }

                            },
                            error: function ($jqXHR, $textStatus, $errorThrown) {

                            }
                        });
                    }
                }, 400);

            });


            $('#uploaded_image').on('click', '.delete-image', function ($e){
                $e.preventDefault();
                $this = $(this);
                $id = $($this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to delete this Image!",
                    icon: "warning",
                    showCancelButton: !0,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "Yes, Do it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    buttonsStyling: !1,
                    showCloseButton: !0,
                }).then((result) => {
                    if (result.isConfirmed) {

                        setTimeout(function() {
                            $.ajax({
                                url: "{{ route('backend.products.deleteImage') }}",
                                type: 'POST',
                                data: {
                                    id: $id,
                                    _token: csrf_token()
                                },
                                dataType: 'json',
                                beforeSend: function ($jqXHR, $obj) {
                                    Swal.fire({
                                        title: "Processing...",
                                        text: "Please wait",
                                        imageUrl: "{{ asset('assets/common/images/ajax-loader.gif') }}",
                                        showConfirmButton: false,
                                        allowOutsideClick: false
                                    });
                                },
                                success: function ($response, $textStatus, $jqXHR) {
                                    Swal.fire('Done!', 'Image has been deleted!', 'success');

                                    $($this).parent().parent().parent().fadeOut('slow');
                                    setTimeout(function (){
                                        $($this).parent().parent().parent().remove();
                                    },1000);
                                },
                                error: function ($jqXHR, $textStatus, $errorThrown) {
                                    Swal.fire('Oops...', 'Something went wrong with the System!', 'error');
                                }
                            });

                        }, 50);
                    }
                });

            });

            $('#uploaded_image').on('click', '.primary-image', function ($e){
                $e.preventDefault();
                $this = $(this);
                $id = $($this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to set this as a Primary Image!",
                    icon: "warning",
                    showCancelButton: !0,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "Yes, Do it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    buttonsStyling: !1,
                    showCloseButton: !0,
                }).then((result) => {
                    if (result.isConfirmed) {

                        setTimeout(function() {
                            $.ajax({
                                url: "{{ route('backend.products.setPrimaryImage') }}",
                                type: 'POST',
                                data: {
                                    id: $id,
                                    _token: csrf_token()
                                },
                                dataType: 'json',
                                beforeSend: function ($jqXHR, $obj) {
                                    Swal.fire({
                                        title: "Processing...",
                                        text: "Please wait",
                                        imageUrl: "{{ asset('assets/common/images/ajax-loader.gif') }}",
                                        showConfirmButton: false,
                                        allowOutsideClick: false
                                    });
                                },
                                success: function ($response, $textStatus, $jqXHR) {
                                    Swal.fire('Done!', 'Primary Image has been updated!', 'success');

                                    $('#uploaded_image').html('');

                                    setTimeout(function (){
                                        $.each($response.images, function ($index, $item){
                                            $img = appendImage($item);
                                            $('#uploaded_image').append($img);
                                        });
                                    }, 100);




                                },
                                error: function ($jqXHR, $textStatus, $errorThrown) {
                                    Swal.fire('Oops...', 'Something went wrong with the System!', 'error');
                                }
                            });

                        }, 50);
                    }
                });


            });


            $('.add-new-price-row').on('click', function ($e){
                $.ajax({
                    url: "{{ route('backend.products.getDetailsForPriceRow') }}",
                    type: 'POST',
                    data: {
                        _token: csrf_token()
                    },
                    dataType: 'json',
                    beforeSend: function ($jqXHR, $obj) {
                        Swal.fire({
                            title: "Processing...",
                            text: "Please wait",
                            imageUrl: "{{ asset('assets/common/images/ajax-loader.gif') }}",
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    },
                    success: function ($response, $textStatus, $jqXHR) {
                        Swal.close();
                        $row = priceRow($response);
                        $('#pricing-area').append($row);
                    },
                    error: function ($jqXHR, $textStatus, $errorThrown) {
                        Swal.fire('Oops...', 'Something went wrong with the System!', 'error');
                    }
                });
            });

            $('#pricing-area').on('click', '.delete-price', function ($e){
                $e.preventDefault();
                $this = $(this);
                $id = $($this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to delete this Price!",
                    icon: "warning",
                    showCancelButton: !0,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "Yes, Do it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    buttonsStyling: !1,
                    showCloseButton: !0,
                }).then((result) => {
                    if (result.isConfirmed) {

                        setTimeout(function() {
                            Swal.fire('Done!', 'Price has been deleted!', 'success');

                            $($this).parent().parent().fadeOut('slow');
                            setTimeout(function (){
                                $($this).parent().parent().remove();
                            },1000);

                        }, 50);
                    }
                });

            });


            $('.add-new-thickness-row').on('click', function ($e){
                $.ajax({
                    url: "{{ route('backend.products.getDetailsForPriceRow') }}",
                    type: 'POST',
                    data: {
                        _token: csrf_token()
                    },
                    dataType: 'json',
                    beforeSend: function ($jqXHR, $obj) {
                        Swal.fire({
                            title: "Processing...",
                            text: "Please wait",
                            imageUrl: "{{ asset('assets/common/images/ajax-loader.gif') }}",
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    },
                    success: function ($response, $textStatus, $jqXHR) {
                        Swal.close();
                        $row = thicknessRow($response);
                        $('#thicknesses-area').append($row);
                    },
                    error: function ($jqXHR, $textStatus, $errorThrown) {
                        Swal.fire('Oops...', 'Something went wrong with the System!', 'error');
                    }
                });
            });

            $('.add-new-label-row').on('click', function ($e){
                $.ajax({
                    url: "{{ route('backend.products.getDetailsForPriceRow') }}",
                    type: 'POST',
                    data: {
                        _token: csrf_token()
                    },
                    dataType: 'json',
                    beforeSend: function ($jqXHR, $obj) {
                        Swal.fire({
                            title: "Processing...",
                            text: "Please wait",
                            imageUrl: "{{ asset('assets/common/images/ajax-loader.gif') }}",
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                    },
                    success: function ($response, $textStatus, $jqXHR) {
                        Swal.close();
                        $row = labelRow($response);
                        $('#labels-area').append($row);
                    },
                    error: function ($jqXHR, $textStatus, $errorThrown) {
                        Swal.fire('Oops...', 'Something went wrong with the System!', 'error');
                    }
                });
            });

            $('#thicknesses-area').on('click', '.delete-thickness', function ($e){
                $e.preventDefault();
                $this = $(this);
                $id = $($this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to delete this!",
                    icon: "warning",
                    showCancelButton: !0,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "Yes, Do it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    buttonsStyling: !1,
                    showCloseButton: !0,
                }).then((result) => {
                    if (result.isConfirmed) {

                        setTimeout(function() {
                            Swal.fire('Done!', 'Thickness has been deleted!', 'success');

                            $($this).parent().parent().fadeOut('slow');
                            setTimeout(function (){
                                $($this).parent().parent().remove();
                            },1000);

                        }, 50);
                    }
                });

            });
            $('#labels-area').on('click', '.delete-label', function ($e){
                $e.preventDefault();
                $this = $(this);
                $id = $($this).data('id');

                Swal.fire({
                    title: "Are you sure?",
                    text: "You want to delete this!",
                    icon: "warning",
                    showCancelButton: !0,
                    showLoaderOnConfirm: true,
                    confirmButtonText: "Yes, Do it!",
                    cancelButtonText: "No, cancel!",
                    confirmButtonClass: "btn btn-primary w-xs me-2 mt-2",
                    cancelButtonClass: "btn btn-danger w-xs mt-2",
                    buttonsStyling: !1,
                    showCloseButton: !0,
                }).then((result) => {
                    if (result.isConfirmed) {

                        setTimeout(function() {
                            Swal.fire('Done!', 'Label has been deleted!', 'success');

                            $($this).parent().parent().fadeOut('slow');
                            setTimeout(function (){
                                $($this).parent().parent().remove();
                            },1000);

                        }, 50);
                    }
                });

            });

        });



    </script>
@endsection
