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
