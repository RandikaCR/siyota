@extends('layouts.frontend')

@section('page_title')
    {{ $product->product }}
@endsection

@php
    $breadcrumbTitle = $product->product;
@endphp

@section('meta_info')
    @php
        $metaTitle = $product->product . ' - Siyota (Pvt) Ltd. Official Website';
        $metaDescription = '';
        $metaKeywords = '';
        $metaImage = '';
        $metaUrl = '';
    @endphp
@endsection

@section('content')

    @include('partials.frontend.breadcrumb')

    <section class="container pt-20 pb-13 pb-lg-20">
        <div class="row ">
            <div class="col-md-6 pe-lg-13 pb-12">
                <div class="position-sticky top-0">
                    <div class="slick-slider g-0 " data-slick-options='{&#34;arrows&#34;:false,&#34;imageSize&#34;:{&#34;img&#34;:{&#34;height&#34;:720,&#34;width&#34;:540}},&#34;slidesToShow&#34;:1}'>
                        @foreach($product->images as $image)
                            <a href="{{ asset('assets/common/images/uploads/' . $image->image) }}" data-gallery="gallery4" data-thumb-src="{{ asset('assets/common/images/uploads/' . $image->image) }}">
                                <img src="{{ asset('assets/common/images/uploads/' . $image->image) }}" data-src="{{ asset('assets/common/images/uploads/' . $image->image) }}" class="lazy-image" alt="">
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-6 pt-md-0 pt-10">
                <p class="d-flex align-items-center mb-6">
                    <span class="fs-18px text-body-emphasis ps-6 fw-bold">{{ priceWithCurrency($product->default_price) }}</span>
                </p>
                <h1 class="mb-4 pb-2 fs-4">{{ $product->product }}</h1>


                <form>
                    <div class="row align-items-end">
                        <div class="col-sm-6 form-group">
                            <label class="text-body-emphasis fw-semibold py-5" for="size">Select a Thickness: </label>
                            <select class="form-control w-100 product-info-2-quantity" id="get-thickness">
                                <option value="0">Default Thickness</option>
                                @foreach($product_prices as $pp)
                                    <option value="{{ $pp->thickness_id }}">{{ $pp->thickness_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label class="text-body-emphasis fw-semibold py-5" for="quantity">Select a Label: </label>
                            <select class="form-control w-100 product-info-2-quantity" id="get-label">
                                <option value="0">Default Label</option>
                                @foreach($product_prices as $pp)
                                    <option value="{{ $pp->label_id }}">{{ $pp->label_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <a href="javascript:void(0);" class="btn btn-lg btn-dark btn-block mb-7 mt-8 w-100 btn-hover-bg-primary btn-hover-border-primary">
                                Get Price
                            </a>
                        </div>
                    </div>
                </form>


                @if(!empty(strip_tags($product->description)))
                    <div class="mt-11">
                        <div class="row">
                            <div class="col-sm-12">
                                <h5 class="mb-5">Product Description</h5>
                                {!! $product->description !!}
                            </div>
                        </div>
                    </div>
                @endif


            </div>
        </div>
    </section>
    <div class="border-top w-100 h-1px"></div>
    @if(!empty(count($related_products)))
    <section class="container pt-15 pb-15 pt-lg-17 pb-lg-20">
        <div class="text-center" ><h2 class="mb-12">You may also like</h2></div>

        <div class="slick-slider" data-slick-options="{&#34;arrows&#34;:true,&#34;centerMode&#34;:true,&#34;centerPadding&#34;:&#34;calc((100% - 1440px) / 2)&#34;,&#34;dots&#34;:true,&#34;infinite&#34;:true,&#34;responsive&#34;:[{&#34;breakpoint&#34;:1200,&#34;settings&#34;:{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;slidesToShow&#34;:3}},{&#34;breakpoint&#34;:992,&#34;settings&#34;:{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;slidesToShow&#34;:2}},{&#34;breakpoint&#34;:576,&#34;settings&#34;:{&#34;arrows&#34;:false,&#34;dots&#34;:false,&#34;slidesToShow&#34;:1}}],&#34;slidesToShow&#34;:4}">

            @foreach($related_products as $rel)
                <div class="mb-6">
                    <div class="card card-product grid-2 bg-transparent border-0">
                        <figure class="card-img-top position-relative mb-7 overflow-hidden">
                            <a href="{{ url('/product/' . $rel->slug) }}" class="hover-zoom-in d-block" title="Shield Conditioner">
                                <img src="{{ asset('assets/common/images/uploads/' . $rel->primary_image) }}" data-src="{{ asset('assets/common/images/uploads/' . $rel->primary_image) }}" class="img-fluid lazy-image w-100" alt="Shield Conditioner">
                            </a>
                            <a href="{{ url('/product/' . $rel->slug) }}" class="btn btn-add-to-cart btn-dark btn-hover-bg-primary btn-hover-border-primary position-absolute z-index-2 text-nowrap">View</a>
                        </figure>
                        <div class="card-body text-center p-0">
                            <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                <ins class="text-decoration-none">{{ priceWithCurrency($rel->default_price) }}</ins>
                            </span>

                            <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3"><a class="text-decoration-none text-reset" href="{{ url('/product/' . $rel->slug) }}">{{ $rel->product }}</a></h4>
                        </div>
                    </div>

                </div>
            @endforeach

        </div>
    </section>
    <div class="border-top w-100 h-1px"></div>
    @endif

@endsection
