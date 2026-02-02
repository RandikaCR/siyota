@extends('layouts.frontend')

@section('page_title')
    Our Services
@endsection

@php
    $breadcrumbTitle = 'Our Services';
@endphp

@section('meta_info')
    @php
        $metaTitle = 'Our Services - Siyota (Pvt) Ltd. Official Website';
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
            <div class="row justify-content-center pb-20">
                <div class="col-sm-10">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="mb-2 pb-3" data-animate="fadeInUp">
                                <h2 class="fs-56px mb-5 new-theme-purple font-bebas">FROM CONCEPT<br>TO CREATION</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2 pb-3" data-animate="fadeInUp">
                                <p class="fs-18px">From durable concrete products to creative landscape designs, we deliver quality, innovation, and lasting results for every project.</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-sm-5 pb-16">
                    <a href="{{ url('/landscapes') }}">
                        <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                            <p class="fs-23px mb-5 font-bebas text-uppercase new-theme-secondary">Landscape Design</p>
                        </div>
                        <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                            <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/services-1.jpg') }}">
                        </div>
                    </a>
                    <a href="{{ url('/landscapes') }}" class=" btn btn-dark text-uppercase btn-hover-bg-primary btn-hover-border-primary px-11"  data-animate="fadeInUp">Explore Now</a>
                </div>
                <div class="col-sm-5 pb-16">
                    <a href="{{ url('/product-categories') }}">
                        <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                            <p class="fs-23px mb-5 font-bebas text-uppercase new-theme-secondary">Concrete Products</p>
                        </div>
                        <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                            <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/services-2.jpg') }}">
                        </div>
                    </a>
                    <a href="{{ url('/product-categories') }}" class=" btn btn-dark text-uppercase btn-hover-bg-primary btn-hover-border-primary px-11"  data-animate="fadeInUp">Explore Now</a>
                </div>
            </div>

        </div>
    </section>

@endsection
