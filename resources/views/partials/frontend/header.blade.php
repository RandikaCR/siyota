<header id="header" class="header header-sticky z-index-5 header-sticky-smart disable-transition-all position-absolute start-0 end-0">
    <div class="sticky-area">
        <div class="main-header nav navbar bg-dark navbar-expand-xl py-6 py-xl-0">
            <div class="container-wide container flex-nowrap">

                <div class="w-72px d-flex d-xl-none">
                    <button class="navbar-toggler align-self-center  border-0 shadow-none px-0 canvas-toggle p-4" type="button"
                            data-bs-toggle="offcanvas"
                            data-bs-target="#offCanvasNavBar"
                            aria-controls="offCanvasNavBar"
                            aria-expanded="false"
                            aria-label="Toggle Navigation">
                        <span class="fs-24 toggle-icon"></span>
                    </button>
                </div>

                <a href="{{ url('/') }}" class="navbar-brand has-sticky-logo py-4">
                    <img class="light-mode-img" src="{{ asset('assets/common/images/logo.png') }}" width="60" alt="Siyota (Pvt) Ltd.">
                    <img class="dark-mode-img" src="{{ asset('assets/common/images/logo-white.png') }}" width="60" alt="Siyota (Pvt) Ltd.">
                    <img class="sticky-logo sticky-logo-light" src="{{ asset('assets/common/images/logo.png') }}" width="60" alt="Siyota (Pvt) Ltd.">
                    <img class="sticky-logo sticky-logo-dark" src="{{ asset('assets/common/images/logo-white.png') }}" width="60" alt="Siyota (Pvt) Ltd."></a>

                <div class="d-none d-xl-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 {{ (request()->segment(1) == '') ? 'active' : '' }}">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px" href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 dropdown dropdown-hover dropdown-fullwidth {{ (request()->segment(1) == 'products' || request()->segment(1) == 'product') ? 'active' : '' }}">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px dropdown-toggle" href="{{ url('/products') }}" data-bs-toggle="dropdown" id="menu-item-products" aria-haspopup="true" aria-expanded="false">Products</a><div class="dropdown-menu mega-menu start-0 py-6 " aria-labelledby="menu-item-products">
                                <div class="megamenu-products container py-8 px-12">
                                    <div class="row">
                                        <div class="col">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="{{ url('/product-categories') }}" class="border-hover text-decoration-none py-4 d-block"><span class="border-hover-target">All Products</span></a>
                                                </li>
                                                @foreach($navProductCategories as $cat)
                                                    <li>
                                                        <a href="{{ url('/product-categories/' . $cat->slug) }}" class="border-hover text-decoration-none py-4 d-block"><span class="border-hover-target">{{ $cat->product_category }}</span></a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 dropdown dropdown-hover dropdown-fullwidth {{ (request()->segment(1) == 'landscapes') ? 'active' : '' }}">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px dropdown-toggle" href="{{ url('/landscapes') }}" data-bs-toggle="dropdown" id="menu-item-landscapes" aria-haspopup="true" aria-expanded="false">Landscapes</a><div class="dropdown-menu mega-menu start-0 py-6 " aria-labelledby="menu-item-landscapes">
                                <div class="megamenu-landscapes container py-8 px-12">
                                    <div class="row">
                                        <div class="col">
                                            <ul class="list-unstyled">
                                                <li>
                                                    <a href="{{ url('/') }}" class="border-hover text-decoration-none py-3 d-block"><span class="border-hover-target">Link</span></a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/') }}" class="border-hover text-decoration-none py-3 d-block"><span class="border-hover-target">Link</span></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 {{ (request()->segment(1) == 'services') ? 'active' : '' }}">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px" href="{{ url('/services') }}">Our Services</a>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 {{ (request()->segment(1) == 'gallery') ? 'active' : '' }}">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px" href="{{ url('/gallery') }}">Gallery</a>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 {{ (request()->segment(1) == 'about-us') ? 'active' : '' }}">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px" href="{{ url('/about-us') }}">About Us</a>
                        </li>
                        <li class="nav-item transition-all-xl-1 py-xl-11 py-0 me-xxl-12 me-xl-10 {{ (request()->segment(1) == 'contact-us') ? 'active' : '' }}">
                            <a class="nav-link d-flex justify-content-between position-relative py-xl-0 px-xl-0 text-uppercase fw-semibold ls-1 fs-15px fs-xl-14px" href="{{ url('/contact-us') }}">Contact Us</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
