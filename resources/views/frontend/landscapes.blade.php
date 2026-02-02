@extends('layouts.frontend')

@section('page_title')
    Landscapes
@endsection

@php
    $breadcrumbTitle = 'Landscapes';
@endphp

@section('meta_info')
    @php
        $metaTitle = 'Landscapes - Siyota (Pvt) Ltd. Official Website';
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
                                <h2 class="fs-56px mb-5 new-theme-purple font-bebas">Shaping spaces<br>Enhancing Nature</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-2 pb-3" data-animate="fadeInUp">
                                <p class="fs-18px">We provide complete landscaping solutions that blend creativity with nature. From design to execution, we use durable, carefully selected landscape accessories to create outdoor spaces that are beautiful, functional, and long-lasting.</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-around" id="image-carousel">
                @foreach($landscapes as $landscape)

                <div class="col-sm-4 pb-3 cursor-pointer" data-src="{{ asset('assets/common/images/uploads/' . $landscape->image) }}">
                    <div class="mb-13 pb-3 text-center" data-animate="fadeInUp">
                        <img class="img-fluid theme-border-radius theme-drop-shadow" src="{{ asset('assets/common/images/uploads/' . $landscape->image) }}">
                    </div>
                </div>

                @endforeach

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
