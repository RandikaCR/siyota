<div class="navbar">
    <div id="offCanvasNavBar" class="offcanvas offcanvas-start new-theme-primary-bg" style="--bs-offcanvas-width: 310px">

        <div class="offcanvas-header new-theme-primary-bg">
            <h3 class="offcanvas-title text-uppercase new-theme-light">SIYOTA</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <hr class="mt-0">
        <div class="offcanvas-body pt-0 mb-2">
            <ul class="navbar-nav">
                <li class="nav-item transition-all-xl-1 py-0">
                    <a class="nav-link d-flex justify-content-between position-relative text-uppercase fw-semibold ls-1 fs-15px"
                       href="{{ url('/') }}">Home</a>
                </li>
                <li class="nav-item transition-all-xl-1 py-0 dropdown dropdown-fullwidth position-static">
                    <a class="nav-link d-flex justify-content-between position-relative text-uppercase fw-semibold ls-1 fs-15px dropdown-toggle" href="javascript:void(0);" data-bs-toggle="dropdown" id="menu-item-products" aria-haspopup="true" aria-expanded="false">Products</a>
                    <div class="dropdown-menu mega-menu start-0 py-6  w-100" aria-labelledby="menu-item-products">
                        <div class="megamenu-shop container-wide py-8 px-12">
                            <div class="row">
                                <div class="col">
                                    <ul class="list-unstyled mb-0">
                                        <li>
                                            <a href="{{ url('/product-categories') }}" class="border-hover text-decoration-none py-3 d-block"><span class="border-hover-target">All Products</span></a>
                                        </li>
                                        @foreach($navProductCategories as $cat)
                                            <li>
                                                <a href="{{ url('/product-categories/' . $cat->slug) }}" class="border-hover text-decoration-none py-3 d-block"><span class="border-hover-target">{{ $cat->product_category }}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </li>
                <li class="nav-item transition-all-xl-1 py-0">
                    <a class="nav-link d-flex justify-content-between position-relative text-uppercase fw-semibold ls-1 fs-15px"
                       href="{{ url('/landscapes') }}">Landscapes</a>
                </li>
                <li class="nav-item transition-all-xl-1 py-0">
                    <a class="nav-link d-flex justify-content-between position-relative text-uppercase fw-semibold ls-1 fs-15px"
                       href="{{ url('/services') }}">Our Services</a>
                </li>
                <li class="nav-item transition-all-xl-1 py-0">
                    <a class="nav-link d-flex justify-content-between position-relative text-uppercase fw-semibold ls-1 fs-15px"
                       href="{{ url('/gallery') }}">Gallery</a>
                </li>
                <li class="nav-item transition-all-xl-1 py-0">
                    <a class="nav-link d-flex justify-content-between position-relative text-uppercase fw-semibold ls-1 fs-15px"
                       href="{{ url('/about-us') }}">About Us</a>
                </li>
                <li class="nav-item transition-all-xl-1 py-0">
                    <a class="nav-link d-flex justify-content-between position-relative text-uppercase fw-semibold ls-1 fs-15px"
                       href="{{ url('/contact-us') }}">Contact Us</a>
                </li>
            </ul>
        </div>
        <hr class="mb-0">
        <div class="offcanvas-footer bg-body-tertiary">
            © 2023 Glowing. <br>
            All rights reserved.
        </div>
    </div>
</div>
