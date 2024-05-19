<!DOCTYPE html>
<html style="overflow-x: hidden;" lang="{{ lang() }}">

<head>
    @include('Client.layouts.css')
</head>
{{-- <body style="overflow-x: hidden;direction:{{ lang('en') ? 'ltr' : 'rtl' }}"> --}}

<body style="overflow-x: hidden;direction:{{ lang('en') ? 'ltr' : 'rtl' }}">
    {{-- <div class="loading-screen  position-fixed top-0 start-0 end-0 bottom-0 bg-black justify-content-center align-items-center">
            <i class="fa fa-spinner fa-spin fa-5x"></i>
        </div> --}}
        
    @include('Client.layouts.header')
    {{-- <div style="padding-top: 120px;"></div> --}}
    @yield('content')
   
    @include('Client.layouts.footer')
    @include('Client.layouts.js')

</body>

</html>
