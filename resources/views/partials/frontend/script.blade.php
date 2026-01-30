<input type="hidden" id="_csrf_token" value="{{ csrf_token() }}">
<script src="{{ asset('assets/frontend/vendors/jquery/3.6.0/jquery.min.js') }}"></script>

<script src="{{ asset('assets/frontend/vendors/bootstrap/js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/clipboard/clipboard.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/vanilla-lazyload/lazyload.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/waypoints/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/lightgallery/lightgallery.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/lightgallery/plugins/zoom/lg-zoom.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/lightgallery/plugins/thumbnail/lg-thumbnail.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/lightgallery/plugins/video/lg-video.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/lightgallery/plugins/vimeoThumbnail/lg-vimeo-thumbnail.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/isotope/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/slick/slick.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/gsap/gsap.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/gsap/ScrollToPlugin.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/gsap/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('assets/frontend/js/theme.min.js') }}"></script>

<script src="{{ asset('assets/common/libs/sweetalert2/sweetalert2.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.8.3/lightgallery.min.js" integrity="sha512-n02TbYimj64qb98ed5WwkNiSw/i9Xlvv4Ehvhg0jLp3qMAMWCYUHbOMbppZ0vimtyiyw9NqNqxUZC4hq86f4aQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@yield('script')
