<meta charset="UTF-8" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="canonical" href="{{ url()->full() }}">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Allura&family=Almarai:wght@300;400;700;800&family=Inter:wght@300;400;500;600;700&family=Paytone+One&family=Poppins:ital,wght@0,300;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Quicksand:wght@300;400;500;600;700&family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,500&family=Tajawal:wght@300;400;500;700;800;900&display=swap"
    rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
    integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="{{ asset('frontEnd/css/font-awesome.css') }}" />
<link rel="stylesheet" href="{{ asset('frontEnd/css/bootstrap.css') }}" />
<link rel="stylesheet" href="{{ asset('frontEnd/css/styles.css') }}" />
<link rel="stylesheet" href="{{ asset('frontEnd/scss/responsive.css') }}" />
<link rel="sitemap" href="/sitemap.xml" title="Sitemap" type="application/xml">
<link href="{{ asset(setting('logo-dark')) }}" rel="shortcut icon">
<meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1">
<meta name="description" content="{{ strip_tags(setting('desc')) }}">
<meta name="keywords" content="{{ strip_tags(setting('keywords')) }}">
<meta name="author" content="{{ setting('title_'.lang()) }}">
<meta name="image" content="{{ asset(setting('logo')) }}">
<meta property="og:title" content="{{ setting('title_'.lang()) }}">
<meta property="og:description" content="{{ strip_tags(setting('desc')) }}">
<meta property="og:locale" content="en">
<meta property="og:image" content="{{ asset(setting('logo')) }}">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:site_name" content="{{ setting('title_'.lang()) }}">
<meta property="og:type" content="website">
<meta name="twitter:card" content="{{ setting('title_'.lang()) }}">
<meta name="twitter:title" content="{{ setting('title_'.lang()) }}">
<meta name="twitter:description" content="{{ strip_tags(setting('desc')) }}">
<meta name="twitter:site" content="{{ setting('title_'.lang()) }}">
<title>{{ setting('title_'.lang()) }}</title>
<link rel="apple-touch-icon" sizes="180x180" href="{{ asset(setting('logo-dark')) }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset(setting('logo-dark')) }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset(setting('logo-dark')) }}">
<style> :root {--main--color: {{ setting('main_color') }};} </style>

@if (lang()=='ar')
    <style>
        .navbar-brand{
            margin-right:0;
            margin-left:1rem;
        }
        .form-select{
            background-position: left 0.75rem center;
        }
        
    </style>
@endif
{{-- <meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ setting('title_'.lang()) }}</title>
<link rel="canonical" href="{{ url()->full() }}">
<link rel="sitemap" href="/sitemap.xml" title="Sitemap" type="application/xml">
<link href="{{ asset(setting('logo_dark')) }}" rel="shortcut icon">
<meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1">
<meta name="description" content="{{ strip_tags(setting('desc')) }}">
<meta name="keywords" content="{{ strip_tags(setting('keywords')) }}">
<meta name="author" content="{{ setting('title_'.lang()) }}">
<meta name="image" content="{{ asset(setting('logo_dark')) }}">
<meta property="og:title" content="{{ setting('title_'.lang()) }}">
<meta property="og:description" content="{{ strip_tags(setting('desc')) }}">
<meta property="og:locale" content="en">
<meta property="og:image" content="{{ asset(setting('logo_dark')) }}">
<meta property="og:url" content="{{ url()->full() }}">
<meta property="og:site_name" content="{{ setting('title_'.lang()) }}">
<meta property="og:type" content="website">
<meta name="twitter:card" content="{{ setting('title_'.lang()) }}">
<meta name="twitter:title" content="{{ setting('title_'.lang()) }}">
<meta name="twitter:description" content="{{ strip_tags(setting('desc')) }}">
<meta name="twitter:site" content="{{ setting('title_'.lang()) }}">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="apple-touch-icon" sizes="180x180" href="{{ asset(setting('logo_dark')) }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{ asset(setting('logo_dark')) }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{ asset(setting('logo_dark')) }}">

{!! setting('snapchat_services') !!}
{!! setting('twitter_services') !!}
{!! setting('facebbok_services') !!}
{!! setting('google_services') !!}
{!! setting('tiktok_services') !!}
{!! setting('instagram_services') !!}

<style> :root {--main--color: {{ setting('main_color') }};} </style>


<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{ asset('assets/css/style.css?v=1.1') }}">
<link rel="stylesheet" href="{{ asset('assets/css/Responsive.css') }}">

@stack('css')

<style>
    @import url('https://fonts.cdnfonts.com/css/montserrat');

    body, h1 , h2 , h3 , h4 , h5 , h6 , p , span  {
      font-family: 'Montserrat', sans-serif;
    }

</style>
                

@if (lang('ar'))
    <style>
        .form-check .form-check-input {
            float: right;
            margin-right: -1.5em;
        }
        .breadcrumb-item+.breadcrumb-item::before {
            float: {{ lang('en') ? 'left' : 'right' }};
        }
        .slick-track{
            float: left;
        }
    </style>
        
@endif --}}
@stack('css')
