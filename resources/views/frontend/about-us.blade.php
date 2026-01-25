@extends('layouts.frontend')

@section('page_title')
    About Us
@endsection

@php
    $breadcrumbTitle = 'About Us';
@endphp

@section('meta_info')
    @php
        $metaTitle = 'About Us - Siyota (Pvt) Ltd. Official Website';
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
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                        <h2 class="mb-0 new-theme-purple font-bebas">Our Story</h2>
                        <p class="fs-23px mb-5 font-bebas text-uppercase new-theme-secondary">Started Small - Built Strong</p>

                    </div>
                    <div class="mb-5 pb-3 text-center" data-animate="fadeInUp">
                        <p class="mb-5 new-theme-secondary">SIYOTA (PVT) LTD started in 2006 with two employees and one product—cement bricks. With hard work and customer trust, we grew step by step.</p>
                        <p class="mb-5 new-theme-secondary">Today, we manufacture a wide range of concrete products and also carry out complete landscaping works.</p>
                        <p class="mb-5 new-theme-secondary">From a small beginning, Siyota now supports over 200 direct and indirect jobs, contributing to the growth of the area.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around">
                <div class="col-sm-5">
                    <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">

                        <h3 class="mb-5 new-theme-purple font-bebas">Our Vision</h3>
                        <p class="fs-23px mb-5 font-bebas text-uppercase new-theme-secondary">To Build Strong and Lasting Solutions</p>
                    </div>
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <p class="mb-5 new-theme-secondary">To become a leading concrete product and landscaping company in Sri Lanka, known for best quality, dependable service, and long-term value.</p>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">

                        <h3 class="mb-5 new-theme-purple font-bebas">Our Mission</h3>
                        <p class="fs-23px mb-5 font-bebas text-uppercase new-theme-secondary">Quality Without Compromise</p>
                    </div>
                    <div class="mb-13 pb-3" data-animate="fadeInUp">
                        <ul class="mb-5 new-theme-secondary">
                            <li>Produce strong, durable concrete products customers can rely on.</li>
                            <li>Deliver practical and attractive landscaping solutions.</li>
                            <li>Maintain consistent quality through certified systems.</li>
                            <li>Complete every job on time, without shortcuts.</li>
                            <li>Create jobs and support the local community.</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                        <p class="fs-23px mb-5 font-bebas text-uppercase new-theme-secondary">We Build What Lasts</p>

                    </div>
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <p class="mb-5 new-theme-secondary">SIYOTA (PVT) LTD is a trusted name in concrete products and landscaping works in Sri Lanka. Based in the Rathnapura District, we focus on one thing only - doing quality work, the right way.</p>
                        <p class="mb-5 new-theme-secondary">From solid concrete products to clean, well-planned outdoor spaces, Siyota delivers strength, neat finishes, and reliable service. Our work is backed by ISO 9001:2015 certification, so customers can trust our quality every time.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                        <h2 class="mb-0 new-theme-purple font-bebas">Our Team</h2>
                        <p class="fs-23px mb-5 font-bebas text-uppercase new-theme-secondary">Leadership That Drives Excellence</p>
                    </div>
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <p class="mb-5 new-theme-secondary">SIYOTA is led by a hands-on management team that values discipline, quality, and customer satisfaction.</p>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-4 mb-15 text-center" data-animate="fadeInUp">
                            <img class="img-fluid" src="{{ asset('assets/common/images/uploads/about-person-1.png') }}">
                            <h5 class="new-theme-purple mt-10 mb-0" data-animate="fadeInUp">Chief Executive Officer</h5>
                            <p class="new-theme-secondary" data-animate="fadeInUp">Mr. Nuwan Perera</p>
                        </div>
                        <div class="col-sm-4 mb-15 text-center" data-animate="fadeInUp">
                            <img class="img-fluid" src="{{ asset('assets/common/images/uploads/about-person-2.png') }}">
                            <h5 class="new-theme-purple mt-10 mb-0" data-animate="fadeInUp">General Manager</h5>
                            <p class="new-theme-secondary" data-animate="fadeInUp">Mr. Swarna Sri</p>
                        </div>
                        <div class="col-sm-4 mb-15 text-center" data-animate="fadeInUp">
                            <img class="img-fluid" src="{{ asset('assets/common/images/uploads/about-person-3.png') }}">
                            <h5 class="new-theme-purple mt-10 mb-0" data-animate="fadeInUp">Chief Of Marketing</h5>
                            <p class="new-theme-secondary" data-animate="fadeInUp">Mr. Suwantha Kithsilu</p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-12 mt-5 mb-40" data-animate="fadeInUp">
                            <img class="img-fluid" src="{{ asset('assets/common/images/uploads/about-team.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
