@extends('layouts.frontend')

@section('page_title')
    Machinery Hire
@endsection

@php
    $breadcrumbTitle = 'Machinery Hire';
@endphp

@section('meta_info')
    @php
        $metaTitle = 'Machinery Hire - Siyota (Pvt) Ltd. Official Website';
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
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                                <h2 class="fs-56px mb-5 new-theme-purple font-bebas">{{ $machinery->title }}</h2>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-2 pb-3 text-center" data-animate="fadeInUp">
                                <p class="fs-18px">{!! $machinery->content !!}</p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

@endsection

@section('script')

@endsection
