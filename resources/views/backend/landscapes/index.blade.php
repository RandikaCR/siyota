@extends('layouts.backend')

@section('page_title')
    All Landscapes
@endsection

@section('breadcrumb')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Landscapes</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">MP Admin</a></li>
                        <li class="breadcrumb-item active">Landscapes</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('header_buttons')
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-end mb-3">
            <a href="{{ url('admin/landscapes/create') }}" class="btn btn-primary">
                <span class="mdi mdi-plus-box me-2"></span>
                Add New
            </a>
        </div>
    </div>
@endsection

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">All Landscapes</h4>
                    <div class="flex-shrink-0">
                    </div>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="live-preview">
                        <div class="row">
                            <div class="col-xl-612">
                                <div class="table-responsive mt-4 mt-xl-0">
                                    <table class="table table-hover table-striped align-middle table-nowrap mb-0">
                                        <thead>
                                        <tr>
                                            <th class="text-center" scope="col">
                                                <p class="mb-0">ID</p>
                                            </th>
                                            <th scope="col" style="width: 25%;">
                                                <p class="mb-0"></p>
                                            </th>
                                            <th class="text-center" scope="col">
                                                <p class="mb-0">Status</p>
                                            </th>
                                            <th class="text-end" scope="col">
                                                <p class="mb-0">Actions</p>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr id="row-{{ $product->id }}">
                                                <td class="fw-medium text-center">
                                                    <p class="mb-0">{{ $product->id }}</p>
                                                </td>
                                                <td>
                                                    <div class="bg-light rounded p-1">
                                                        <img src="{{ asset('assets/common/images/uploads/' .$product->image) }}" class="img-fluid d-block" alt="Img">
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <p class="mb-0"><span class="badge {{ $product->status()->class }}">{{ $product->status()->text }}</span></p>
                                                </td>
                                                <td class="text-end">
                                                    <div class="d-flex justify-content-end align-items-center">
                                                        <div class="form-check form-switch form-switch-success form-switch-md">
                                                            <input class="form-check-input status" data-id="{{ $product->id }}" type="checkbox" role="switch"  {{ ($product->status == 1) ? 'checked': '' }} >
                                                        </div>
                                                        <div>
                                                            <a href="javascript:void(0);" class="btn btn-danger btn-sm waves-effect waves-light delete" data-id="{{ $product->id }}" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"><span class="mdi mdi-delete"></span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="mt-5">
                            {{--Paginaiton--}}
                            {!! $products->links('vendor.pagination.backend') !!}
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>

@endsection

@section('scripts')

    <!--jquery cdn-->
    <script src="{{ asset('assets/backend/packages/code.jquery.com/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--select2 cdn-->
    <script src="{{ asset('assets/backend/packages/cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/js/select2.min.js') }}"></script>

    <script src="{{ asset('assets/backend/js/pages/select2.init.js') }}"></script>

@endsection

@section('custom_scripts')

    <script>
        $(document).ready(function (){

            $('.table').on('click', '.delete', function ($e){
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
                            $.ajax({
                                url: "{{ route('backend.landscapes.delete') }}",
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
                                    Swal.fire('Done!', 'Landscape image has been deleted!', 'success');

                                    $($this).parent().parent().parent().parent().fadeOut('slow');
                                    setTimeout(function (){
                                        $($this).parent().parent().parent().parent().remove();
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

            $('.table').on('change', '.status', function (){
                $id = $(this).data('id');
                $url = "{{ route('backend.landscapes.status') }}";
                $rowId = '#row-' + $id;
                $.ajax({
                    url: $url,
                    dataType: 'json',
                    data: {
                        "id": $id,
                        "_token": csrf_token()
                    },
                    method: 'POST',
                    beforeSend: function ($jqXHR, $obj) {

                    },
                    success: function ($res, $textStatus, $jqXHR) {
                        $($rowId).find('.badge').removeClass('bg-success bg-warning').addClass($res.class);
                        $($rowId).find('.badge').html($res.text);
                    },
                    error: function ($jqXHR, $textStatus, $errorThrown) {

                    }
                });
            });

        });
    </script>

@endsection
