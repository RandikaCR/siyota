@yield('meta_info')
<meta charset="UTF-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>@yield('page_title') :: Siyota (Pvt) Ltd. Official Website</title>
<link rel="icon" href="{{ asset('assets/frontend/images/others/favicon.ico') }}">

@php
    $metaTitle = !empty($metaTitle) ? $metaTitle : 'Siyota (Pvt) Ltd. Official Website';
    $metaDescription = !empty($metaDescription) ? $metaDescription : '';
    $metaKeywords = !empty($metaKeywords) ? $metaKeywords : '';
    //$metaImage = !empty($metaImage) ? $metaImage : asset('assets/common/images/meta-image.jpg');
    $metaImage = '';
    $metaUrl = !empty($metaUrl) ? $metaUrl : url('');
@endphp

<meta property="title" content="{{ $metaTitle }}" />
<meta name="description" content="{{ $metaDescription }}">
<meta name="keywords" content="{{ $metaKeywords }}">
<meta name="author" content="www.siyota.lk">

<meta property="og:title" content="{{ $metaTitle }}" />
<meta property="og:description" content="{{ $metaDescription }}" />
<meta property="og:image" content="{{ $metaImage }}" />
<meta property="og:url" content="{{ $metaUrl }}" />
<meta property="og:type" content="article" />
<meta property="og:site_name" content="Siyota (Pvt) Ltd. Official Website" />


<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/lightgallery/css/lightgallery-bundle.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/fontawesome/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/animate/animate.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/slick/slick.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/vendors/mapbox-gl/mapbox-gl.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/frontend/font/bootstrap-icons.css') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/frontend/css/theme.css') }}">

<script src="{{ asset('assets/common/js/app.js') }}"></script>
<script src="{{ asset('assets/common/js/common.js') }}"></script>

<link href="{{ asset('assets/common/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.8.3/css/lightgallery.min.css" integrity="sha512-QMCloGTsG2vNSnHcsxYTapI6pFQNnUP6yNizuLL5Wh3ha6AraI6HrJ3ABBaw6SIUHqlSTPQDs/SydiR98oTeaQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
