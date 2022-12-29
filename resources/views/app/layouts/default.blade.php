<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - {{ ENV('APP_NAME') }}</title>
@yield('metaHead')

<!-- Google / Search Engine Tags -->
    <meta itemprop="name" content="{{ ENV('APP_NAME') }}">
    <meta itemprop="description"
          content="Mon Commerçant Corse, est une plateforme de référencement de nos Commerçants/Artisans/Producteurs de Corse.">
    <meta itemprop="image" content="">
    <meta name="keywords"
          content="corse, commerçant, commerçant corse, commerce, proximités, proximité, publicité, services, valorisation, savoir-faire corse, artisanat, commerçant artisan, petit commerçant à proximité">

    <!-- Facebook Meta Tags -->
    <meta property="og:type" content="website">
    <meta property="og:local" name="og:local" content="français">
    <meta property="og:title" content="{{ ENV('APP_NAME') }}">
    <meta name="og:site_name" property="og:site_name" content="Mon Commerçant Corse">
    <meta property="og:description"
          content="Mon Commerçant Corse, est une plateforme de référencement de nos Commerçants/Artisans/Producteurs de Corse.">
    <meta property="og:image" content="">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ ENV('APP_NAME') }}">
    <meta name="twitter:description"
          content="Mon Commerçant Corse, est une plateforme de référencement de nos Commerçants/Artisans/Producteurs de Corse.">
    <meta name="twitter:image" content="">


    <link rel="icon" type="image/png" href=""/>

    <!-- Styles -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    @vite(['resources/sass/app.scss', 'public/assets/css/app.css'])

    @yield('styleHeader')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>

    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    @yield('scriptHeader')

</head>
<body>
@include('app.components.header')
@include('app.components.message')
@yield('content')

@yield('scriptFooter')
{{-- @include('cookieConsent::index') --}}
</body>
</html>
