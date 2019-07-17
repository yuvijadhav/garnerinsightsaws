<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="img/favicon.png"/>
        <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" /> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!}
            ;
            baseURL = "{{config('app.baseURL')}}";
        </script>
        <link rel="stylesheet" href="{{ asset('css/allinone.css')}}">
        <link rel="stylesheet" href="{{ asset('theme-vendor/OwlCarousel/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{ asset('theme-vendor/OwlCarousel/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{ asset('theme-vendor/noUiSlider/nouislider.min.css')}}">

        <script type="text/javascript" src="{{ asset('js/jquery.min.js')}}"></script> 
        <script src="{{ asset('js/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{ asset('js/template.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/mustache.js')}}" type="text/javascript"></script>
        <script src="{{ asset('js/pagination.js')}}" type="text/javascript"></script>

        <script type="text/javascript">
            function loadCSS(filename) {
                var file = document.createElement("link");
                file.setAttribute("rel", "stylesheet");
                file.setAttribute("type", "text/css");
                file.setAttribute("href", filename);

                if (typeof file !== "undefined") {
                    document.getElementsByTagName("head")[0].appendChild(file)
                }
            }
            loadCSS("https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css");
        </script>
    
    <!-- Header Area Start Here -->
    <div id="wrapper">
        @include("layouts.header")
        @yield('content')
        @include("layouts.footer")
    </div>
    <script src="{{ asset('js/core.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/zebra_datepicker.js')}}" type="text/javascript"></script>

</body>
</html>
