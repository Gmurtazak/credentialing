<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(Auth::user())
    <meta name="token-bearer" content="{{ Auth::user()->auth_token }}">
    @endif
    <title>{{ config('app.name', 'Credentialing') }}</title>


    <!-- Fonts -->
    <link rel="icon" href="assets/images/DS.ico">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css?v=1.1.0')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css?v=1.0.0')}}">
    <link rel="stylesheet" href="{{asset('assets/css/apexcharts.css')}}">
    <link rel="stylesheet" href="{{asset('assets/tokenize/tokenize2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/countrySelect.css')}}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!-- Scripts -->
    <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    <script src="/assets/js/bootstrap/bootstrap.bundle.js"></script>
    <script src="{{asset('assets/js/countrySelect.js')}}"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-more.js"></script>
    <script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $(document).ready(function(){
            $(".sidebar-wrapper ul li a").hover(function(){
                var menuID = $(this).attr('data-id');
                $(".submenu-wrap > div").addClass('d-none');
                if(menuID){
                   $('.sidebar-wrapper ul li a').parent().removeClass('active');
                   $(this).parent().addClass('active');
                   $(".submenu-wrap").addClass('active');
                   $(".submenu-wrap").find("div#"+menuID).removeClass('d-none');
               }

                // setTimeout(function(){$(".submenu-wrap").addClass('active');},300)

            });
            $('.submenu-wrap').mouseleave(function(){
                $(this).removeClass('active');
                $(".submenu-wrap > div").addClass('d-none');
                $('.sidebar-wrapper ul li a').parent().removeClass('active');

            });
        });
    </script>
    <script type="text/javascript">
        var baseUrl = '{{ url('/') }}';
    </script>
</head>
<body>
    <div id="app">
        @if(Auth::user())
            {{--header--}}
            @include('partials.header')
            {{--header--}}
        @endif

        {{--ALERT--}}
            @include('partials.alert')
        {{--ALERT--}}

        {{--content--}}
            @yield('content')
        {{--content--}}
        @if(Auth::user())
            {{--footer--}}
            @include('partials.footer')
            {{--footer--}}
        @endif
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
<script src="{{asset('assets/js/jquery-ui.js')}}" ></script>
<script src="{{asset('assets/tokenize/tokenize2.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js?v=1.0')}}<?php echo time();?>"></script>

</html>
