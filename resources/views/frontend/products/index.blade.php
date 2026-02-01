@extends('layouts.frontend')

@section('page_title')
{{ $title }}
@endsection

@php
    $breadcrumbTitle = $title;
@endphp

@section('meta_info')
    @php
        $metaTitle = $title . ' - Siyota (Pvt) Ltd. Official Website';
        $metaDescription = '';
        $metaKeywords = '';
        $metaImage = '';
        $metaUrl = '';
    @endphp
@endsection

@section('content')

    @include('partials.frontend.breadcrumb')

    <section class="page-title z-index-2 position-relative">

        <div class="text-center py-13">
            <div class="container">
                <h2 class="mb-0">{{ $title }}</h2></div>
        </div>
    </section>

    <div class="container container-xxl pb-16 pb-lg-18">

        <div class="row">
            <div class="col-lg-9 order-lg-1">
                <div class="row gy-11">
                    @foreach($products as $product)
                        <div class="col-sm-6 col-lg-4 col-xl-3">
                            <div class="card card-product grid-2 bg-transparent" data-animate="fadeInUp">
                                <figure class="card-img-top position-relative mb-7 overflow-hidden">
                                    <a href="{{ url('/product/' . $product->slug) }}" class="hover-zoom-in d-block" title="Shield Conditioner">
                                        <img src="{{ asset('assets/common/images/uploads/' . $product->primary_image) }}" data-src="{{ asset('assets/common/images/uploads/' . $product->primary_image) }}" class="img-fluid lazy-image w-100" alt="Shield Conditioner">
                                    </a>

                                    <a href="{{ url('/product/' . $product->slug) }}" class="btn btn-add-to-cart btn-dark btn-hover-bg-primary btn-hover-border-primary position-absolute z-index-2 text-nowrap btn-sm px-6 py-3 lh-2">View</a>
                                </figure>
                                <div class="card-body text-center">
                                <span class="d-flex align-items-center price text-body-emphasis fw-bold justify-content-center mb-3 fs-6">
                                    <ins class="text-decoration-none">{{ priceWithCurrency($product->default_price) }}</ins>
                                </span>
                                    <h4 class="product-title card-title text-primary-hover text-body-emphasis fs-15px fw-500 mb-3">
                                        <a class="text-decoration-none text-reset" href="{{ url('/product/' . $product->slug) }}">{{ $product->product }}</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{--Paginaiton--}}
                {!! $products->links('vendor.pagination.frontend') !!}


            </div>
            <div class="col-lg-3 d-lg-block d-none">
                <div class="position-sticky top-0">
                    <aside class="primary-sidebar pe-xl-9 me-xl-2 mt-12 pt-2 mt-lg-0 pt-lg-0">
                        <div class="widget widget-product-hightlight">
                            <h4 class="widget-title fs-5 mb-6">Categories</h4>
                            <ul class="navbar-nav navbar-nav-cate" id="widget_product_hightlight">
                                <li class="nav-item {{ (request()->segment(2) == '') ? 'active' : '' }}">
                                    <a href="{{ url('/product-categories') }}" title="All Products"
                                       class="text-reset position-relative d-block text-decoration-none text-body-emphasis-hover d-flex align-items-center"><span class="text-hover-underline {{ (request()->segment(2) == '') ? 'active' : '' }}">All Products</span></a>
                                </li>
                                @foreach($navProductCategories as $cat)
                                    <li class="nav-item {{ (request()->segment(2) == $cat->slug) ? 'active' : '' }}">
                                        <a href="{{ url('/product-categories/' . $cat->slug) }}" title="{{ $cat->product_category }}"
                                           class="text-reset position-relative d-block text-decoration-none text-body-emphasis-hover d-flex align-items-center"><span class="text-hover-underline {{ (request()->segment(2) == $cat->slug) ? 'active' : '' }}">{{ $cat->product_category }}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>

@endsection
