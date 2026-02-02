@extends('layouts.frontend')

@section('page_title')
    Welcome
@endsection

@section('content')

    <section>

        <div class="slick-slider hero hero-header-01"
             data-slick-options='{&#34;arrows&#34;:false,&#34;autoplay&#34;:true,&#34;cssEase&#34;:&#34;ease-in-out&#34;,&#34;dots&#34;:false,&#34;fade&#34;:true,&#34;infinite&#34;:true,&#34;slidesToShow&#34;:1,&#34;speed&#34;:600}'>
            <div class="vh-100 d-flex align-items-center">
                <div class="z-index-2 container container-xxl py-21 pt-xl-10 pb-xl-11">

                    <div class="hero-content text-start">
                        <div data-animate="fadeInDown">
                            <p class="text-body-emphasis mb-0 text-uppercase fw-semibold fs-18px new-theme-secondary">Shape Your Outdoors</p>
                            <h1 class="mb-0 hero-title font-bebas new-theme-purple">Build It to Last</h1>
                            <p class="hero-desc text-body-calculate fs-23px mb-11 new-theme-secondary">Concrete that adds beauty, not just structure</p>
                        </div>
                    </div>
                </div>
                <div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img" data-bg-src="{{ asset('assets/common/images/uploads/banner-1.jpg') }}">
                </div>
                <div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="{{ asset('assets/common/images/uploads/banner-1.jpg') }}">
                </div>
            </div>

            <div class="vh-100 d-flex align-items-center">
                <div class="z-index-2 container container-xxl py-21 pt-xl-10 pb-xl-11">

                    <div class="hero-content text-start">
                        <div data-animate="fadeInDown">
                            <p class="text-body-emphasis mb-0 text-uppercase fw-semibold fs-18px new-theme-secondary">Set Once</p>
                            <h1 class="mb-0 hero-title font-bebas new-theme-purple">Built for Life</h1>
                            <p class="hero-desc text-body-calculate fs-23px mb-11 new-theme-secondary">Strength you never have to worry about</p>
                        </div>
                    </div>
                </div>
                <div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img" data-bg-src="{{ asset('assets/common/images/uploads/banner-2.jpg') }}">
                </div>
                <div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="{{ asset('assets/common/images/uploads/banner-2.jpg') }}">
                </div>
            </div>

            <div class="vh-100 d-flex align-items-center">
                <div class="z-index-2 container container-xxl py-21 pt-xl-10 pb-xl-11">

                    <div class="hero-content text-start">
                        <div data-animate="fadeInDown">
                            <p class="text-body-emphasis mb-0 text-uppercase fw-semibold fs-18px new-theme-secondary">Strong Underfoot</p>
                            <h1 class="mb-0 hero-title font-bebas new-theme-purple">Perfect in Finish</h1>
                            <p class="hero-desc text-body-calculate fs-23px mb-11 new-theme-secondary">Built for heavy use & designed to look sharp</p>
                        </div>
                    </div>
                </div>
                <div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img" data-bg-src="{{ asset('assets/common/images/uploads/banner-3.jpg') }}">
                </div>
                <div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="{{ asset('assets/common/images/uploads/banner-3.jpg') }}">
                </div>
            </div>

            <div class="vh-100 d-flex align-items-center">
                <div class="z-index-2 container container-xxl py-21 pt-xl-10 pb-xl-11">

                    <div class="hero-content text-start">
                        <div data-animate="fadeInDown">
                            <p class="text-body-emphasis mb-0 text-uppercase fw-semibold fs-18px new-theme-secondary">Clean Design</p>
                            <h1 class="mb-0 hero-title font-bebas new-theme-purple">Solid Beauty</h1>
                            <p class="hero-desc text-body-calculate fs-23px mb-11 new-theme-secondary">Timeless concrete for modern spaces</p>
                        </div>
                    </div>
                </div>
                <div class="lazy-bg bg-overlay position-absolute z-index-1 w-100 h-100   light-mode-img" data-bg-src="{{ asset('assets/common/images/uploads/banner-4.jpg') }}">
                </div>
                <div class="lazy-bg bg-overlay dark-mode-img position-absolute z-index-1 w-100 h-100" data-bg-src="{{ asset('assets/common/images/uploads/banner-4.jpg') }}">
                </div>
            </div>

        </div>
    </section>

    <section class="new-theme-light-bg new-theme-secondary">

        <div class="container container-xxl py-lg-17 pt-14 pb-16">
            <!-- <div class="row justify-content-center">
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
            </div> -->

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                        <!-- <p class="fs-23px mb-5 font-bebas text-uppercase new-theme-secondary">We Build What Lasts</p> -->
                        <h2 class="mb-0 new-theme-purple font-bebas">We Build What Lasts</h2>

                    </div>
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <p class="mb-5 new-theme-secondary">SIYOTA (PVT) LTD is a trusted name in concrete products and landscaping works in Sri Lanka, based in the Rathnapura District. We focus on one thing only - doing quality work, the right way.</p>
                        <p class="mb-5 new-theme-secondary">From solid concrete products to clean, well-planned outdoor spaces, we deliver strength, neat finishes, and reliable service. Our work is backed by ISO 9001:2015 certification, so customers can trust our quality every time.
                        </p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                        <h3 class="mb-5 new-theme-purple font-bebas">Our Services</h3>
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
                            <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/about-team.jpg') }}">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection
