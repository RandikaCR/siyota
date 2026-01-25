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
                <div class="col-sm-8">
                    <div id="map" class="mapbox-gl map-point-animate map-box-has-effect "
                         style="height:530px"
                         data-mapbox-access-token="pk.eyJ1IjoiZzVvbmxpbmUiLCJhIjoiY2t1bWY4NzBiMWNycDMzbzZwMnI5ZThpaiJ9.ZifefVtp4anluFUbAMxAXg"
                         data-mapbox-options='{&#34;center&#34;:[-106.53671888774004,35.12362056187368],&#34;setLngLat&#34;:[-106.53671888774004,35.12362056187368],&#34;style&#34;:&#34;mapbox://styles/mapbox/light-v10&#34;,&#34;zoom&#34;:5}'
                         data-mapbox-marker='[{&#34;backgroundImage&#34;:&#34;/assets/images/others/marker.png&#34;,&#34;backgroundRepeat&#34;:&#34;no-repeat&#34;,&#34;className&#34;:&#34;marker&#34;,&#34;height&#34;:&#34;70px&#34;,&#34;position&#34;:[-102.53671888774004,38.12362056187368],&#34;width&#34;:&#34;70px&#34;},{&#34;backgroundImage&#34;:&#34;/assets/images/others/marker.png&#34;,&#34;backgroundRepeat&#34;:&#34;no-repeat&#34;,&#34;className&#34;:&#34;marker&#34;,&#34;height&#34;:&#34;70px&#34;,&#34;position&#34;:[-109.03671888774004,33.02362056187368],&#34;width&#34;:&#34;70px&#34;}]'>
                    </div>

                    <div class="container py-17">
                        <div class="row">
                            <div class="col-sm-12">
                                <h2 class="mb-11 fs-3 new-theme-purple font-bebas">Send A Message</h2>
                                <form class="contact-form" method="post" action="#">
                                    <div class="row mb-8 mb-md-10">
                                        <div class="col-12 mb-8">
                                            <input type="text" class="form-control input-focus" placeholder="Your Name">
                                        </div>
                                        <div class="col-md-6 col-12 mb-8">
                                            <input type="text" class="form-control input-focus" placeholder="Phone Number">
                                        </div>
                                        <div class="col-md-6 col-12 mb-8">
                                            <input type="email" class="form-control input-focus" placeholder="Email Address">
                                        </div>
                                        <div class="col-12">
                                            <input type="text" class="form-control input-focus" placeholder="Subject">
                                        </div>
                                    </div>
                                    <textarea class="form-control mb-6 input-focus" placeholder="Messenger" rows="7"></textarea>
                                    <button type="submit" class=" btn btn-dark text-uppercase btn-hover-bg-primary btn-hover-border-primary px-11">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="">
                        <h2 class="mb-5 fs-3 new-theme-purple font-bebas">Contact Details</h2>

                        <p class=" fs-6 new-theme-secondary"><i class="fa fa-location-pin new-theme-purple pe-4"></i>Siyota Enterprises
                            <br><span class="ms-7">Panawenna</span>
                            <br><span class="ms-7">Pelmadulla</span>
                        </p>
                        <p class="fs-6 new-theme-secondary"><i class="fa fa-envelope new-theme-purple pe-4"></i> siyotaenterprises@gmail.com</p>
                        <p class="fs-6 fw-bold new-theme-secondary"><i class="fa fa-phone new-theme-purple pe-4"></i> 076 878 1126</p>
                    </div>
                    <div class="mt-20">
                        <h2 class="mb-5 fs-3 new-theme-purple font-bebas">Our Partners</h2>

                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
