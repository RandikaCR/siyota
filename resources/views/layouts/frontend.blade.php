<!doctype html>
<html lang="en" data-bs-theme="light">
<head>
    @include('partials.frontend.head')
</head>

<body>

@include('partials.frontend.header')

<main id="content" class="wrapper layout-page">

    @yield('content')

</main>

@include('partials.frontend.footer')

@include('partials.frontend.script')

@include('partials.frontend.navigation-mobile')

</body>
</html>
