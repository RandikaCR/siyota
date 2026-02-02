@extends('layouts.frontend')

@section('page_title')
    Contact Us
@endsection

@php
    $breadcrumbTitle = 'Contact Us';
@endphp

@section('meta_info')
    @php
        $metaTitle = 'Contact Us - Siyota (Pvt) Ltd. Official Website';
        $metaDescription = '';
        $metaKeywords = '';
        $metaImage = '';
        $metaUrl = '';
    @endphp
@endsection

@section('content')

    @include('partials.frontend.breadcrumb')


    <section class="new-theme-light-bg new-theme-secondary">
        <div class="container container-xxl py-lg-17 pt-14 pb-16">
            <div class="row">
                <div class="col-sm-9">
                    <div id="map" class="mapbox-gl map-point-animate map-box-has-effect" style="height:530px">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3963.3895144888716!2d80.55454697582458!3d6.598418622286493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae3ed945d837d39%3A0x5e0c03aaa727ac65!2sSiyota%20(pvt)ltd!5e0!3m2!1sen!2slk!4v1769670112318!5m2!1sen!2slk" width="100%" class="theme-border-radius" height="530px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>

                    <div class="container py-17">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="mb-11 fs-3 new-theme-purple font-bebas">Send A Message</h2>
                                <form class="contact-form" method="post" action="#">
                                    <div class="row mb-8 mb-md-10">
                                        <div class="col-12 mb-8">
                                            <input type="text" class="form-control input-focus" placeholder="Your Name" id="name">
                                        </div>
                                        <div class="col-md-6 col-12 mb-8">
                                            <input type="text" class="form-control input-focus" placeholder="Phone Number" id="phone">
                                        </div>
                                        <div class="col-md-6 col-12 mb-8">
                                            <input type="email" class="form-control input-focus" placeholder="Email Address" id="email">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control input-focus" placeholder="Subject" id="subject">
                                        </div>
                                    </div>
                                    <textarea class="form-control mb-6 input-focus" placeholder="Message" id="message" rows="7"></textarea>
                                    <a href="javascript:void(0);" class=" btn btn-dark text-uppercase btn-hover-bg-primary btn-hover-border-primary px-11 send-message">Submit Message</a>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="ms-5">
                        <h2 class="mb-5 fs-3 new-theme-purple font-bebas">Contact Details</h2>

                        <p class=" fs-6 new-theme-secondary"><i class="fa fa-location-pin new-theme-purple pe-4"></i>Siyota Enterprises
                            <br><span class="ms-7">Panawenna</span>
                            <br><span class="ms-7">Pelmadulla</span>
                        </p>
                        <p class="fs-6 new-theme-secondary"><i class="fa fa-envelope new-theme-purple pe-4"></i> siyotaenterprises@gmail.com</p>
                        <p class="fs-6 fw-bold new-theme-secondary"><i class="fa fa-phone new-theme-purple pe-4"></i> 076 878 1126</p>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
@section('script')
    <script>

        function validateEmail($email) {
            // Regular expression for email validation
            var regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            // Return true if email matches regex, false otherwise
            return regex.test($email);
        }

        $(document).ready(function (){
            $('.send-message').on('click', function ($e){
                $e.preventDefault();

                $name = $('#name').val().trim();
                $phone = $('#phone').val().trim();
                $email = $('#email').val().trim();
                $subject = $('#subject').val().trim();
                $message = $('#message').val().trim();

                $isInvalid = 0;

                if($name == ''){
                    $isInvalid++;
                    Swal.fire('Unable to send...', 'Name is required!', 'error');
                }else if($phone == ''){
                    $isInvalid++;
                    Swal.fire('Unable to send...', 'Phone number is required!', 'error');
                }else if($email == ''){
                    $isInvalid++;
                    Swal.fire('Unable to send...', 'Email is required!', 'error');
                }else if(!validateEmail($email)){
                    $isInvalid++;
                    Swal.fire('Unable to send...', 'Invalid Email address!', 'error');
                }else if($subject == ''){
                    $isInvalid++;
                    Swal.fire('Unable to send...', 'Subject is required!', 'error');
                }else if($message == ''){
                    $isInvalid++;
                    Swal.fire('Unable to send...', 'Message is required!', 'error');
                }

                if($isInvalid == 0){
                    Swal.fire({
                        title: "Are you sure?",
                        text: "You want to send this message!",
                        icon: "warning",
                        showCancelButton: !0,
                        showLoaderOnConfirm: true,
                        confirmButtonText: "Yes, Send it!",
                        cancelButtonText: "No, cancel!",
                        confirmButtonClass: "btn new-theme-purple-bg new-theme-light font-bebas w-xs me-2 mt-2",
                        cancelButtonClass: "btn btn-secondary font-bebas new-theme-secondary w-xs mt-2",
                        buttonsStyling: !1,
                        showCloseButton: !0,
                    }).then((result) => {
                        if (result.isConfirmed) {

                            setTimeout(function() {
                                $.ajax({
                                    url: "{{ route('frontend.contacts.sendMessage') }}",
                                    type: 'POST',
                                    data: {
                                        name: $name,
                                        phone: $phone,
                                        email: $email,
                                        subject: $subject,
                                        message: $message,
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
                                        Swal.fire('Thank You!', 'Message has been sent successfully!. You will be contacted as soon as possible', 'success');

                                        $('#name').val('');
                                        $('#phone').val('');
                                        $('#email').val('');
                                        $('#subject').val('');
                                        $('#message').val('');

                                        setTimeout(function(){
                                            location.reload();
                                        },2000);
                                    },
                                    error: function ($jqXHR, $textStatus, $errorThrown) {
                                        Swal.fire('Oops...', 'Something went wrong with the System!', 'error');
                                    }
                                });

                            }, 50);
                        }
                    });
                }


            });
        });

    </script>
@endsection
