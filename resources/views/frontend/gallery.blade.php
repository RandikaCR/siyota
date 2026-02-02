@extends('layouts.frontend')

@section('page_title')
    Gallery
@endsection

@php
    $breadcrumbTitle = 'Gallery';
@endphp

@section('meta_info')
    @php
        $metaTitle = 'Gallery - Siyota (Pvt) Ltd. Official Website';
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
                                <h2 class="fs-56px mb-5 new-theme-purple font-bebas">OUR PEOPLE<br>OUR PROCESS</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2 pb-3" data-animate="fadeInUp">
                                <p class="fs-18px">Skilled team and advanced technology bring every project to life. Each image reflects our commitment to craftsmanship, innovation, and high standards.</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-around" id="image-carousel">
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-1.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-1.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-2.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-2.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-3.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-3.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-4.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-4.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-5.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-5.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-6.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-6.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-7.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-7.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-8.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-8.jpg') }}">
                    </div>
                </div>
                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/gallery-9.jpg') }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/gallery-9.jpg') }}">
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('script')
    <script>
        $(document).ready(function (){
            lightGallery(document.getElementById('image-carousel'), {
                thumbnail: true,
            });
        });
    </script>
@endsection
