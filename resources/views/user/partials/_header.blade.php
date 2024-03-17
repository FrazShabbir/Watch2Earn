<meta charset="utf-8" />
<title> @yield('title','PlotXperts') | PlotXperts </title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
<meta content="Themesbrand" name="author" />
<!-- App favicon -->
<link rel="shortcut icon" href="{{asset('backend/assets/favicon_backend/favicon.ico')}}">
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('backend/assets/favicon_backend/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('backend/assets/favicon_backend/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('backend/assets/favicon_backend/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('backend/assets/favicon_backend/site.webmanifest')}}">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />


<!-- jsvectormap css -->
<link href="{{asset('backend/assets/libs/jsvectormap/css/jsvectormap.min.css')}}" rel="stylesheet" type="text/css" />

<!--Swiper slider css-->
<link href="{{asset('backend/assets/libs/swiper/swiper-bundle.min.css')}}" rel="stylesheet" type="text/css" />

<!-- Layout config Js -->
<script src="{{asset('backend/assets/js/layout.js')}}?version=4"></script>
<!-- Bootstrap Css -->
<link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" />
<!-- custom Css-->
<link href="{{asset('backend/assets/css/custom.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('bootstrap-tagsinput.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.all.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.5/dist/sweetalert2.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('intl-tel-input/css/intlTelInput.min.css') }}">
<script src="{{ asset('intl-tel-input/js/intlTelInput.min.js') }}"></script>

@yield('styles')
@stack('pagestyles')
