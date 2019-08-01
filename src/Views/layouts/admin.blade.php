<!doctype html>
<html class="fixed sidebar-left-collapsed">
    <head>

        <!-- Basic -->
        <meta charset="UTF-8">

        <title>HRManager | {{$navActive['title'] ?? null}}</title>
        <meta name="keywords" content="HTML5 Admin Template" />
        <meta name="description" content="Porto Admin - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.css') }}" />

        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/css/font-awesome.css')}}" />
        {{-- <link rel="stylesheet" href="{{asset('assets/vendor/magnific-popup/magnific-popup.css')}}" /> --}}
        {{-- <link rel="stylesheet" href="{{asset ('assets/vendor/bootstrap-datepicker/css/datepicker3.css')}}" /> --}}

        <!-- Specific Page Vendor CSS -->
        <link rel="stylesheet" href="{{asset('assets/vendor/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css')}}" />
        {{-- <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}" /> --}}
        {{-- <link rel="stylesheet" href="{{asset('assets/vendor/morris/morris.css')}}" /> --}}

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{asset('assets/stylesheets/theme.css')}}" />

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{asset('assets/stylesheets/skins/default.css')}}" />

        <!-- Theme Custom CSS -->
        {{-- <link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}"> --}}

        <link rel="stylesheet" href="{{asset('assets/stylesheets/theme-custom.css')}}">

        @yield('css')


        <!-- Head Libs -->
        {{-- <script src="{{asset('assets/vendor/toaster/build/toastr.css')}}"></script> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css
        ">
    </head>
    <body>
        <section class="body">

            @include('layouts.navbar.admin_nav')            
            <div class="inner-wrapper">
                @if (Auth::user()->isHR() || Auth::user()->isAdmin() || Auth::user()->isFinance())
                    @include('layouts.sidebar.admin_side')
                @endif
                <section role="main" class="content-body sec-body">
                    @yield('body')
                </section>
            </div>
        </section>

        <!-- Vendor -->
        <script src="{{asset('assets/vendor/jquery/jquery.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.js')}}"></script>
        <script src="{{asset('assets/vendor/nanoscroller/nanoscroller.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('assets/vendor/magnific-popup/magnific-popup.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-placeholder/jquery.placeholder.js')}}"></script>
        
        <!-- Specific Page Vendor -->
        <script src="{{asset('assets/vendor/jquery-ui/js/jquery-ui-1.10.4.custom.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-ui-touch-punch/jquery.ui.touch-punch.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-appear/jquery.appear.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-easypiechart/jquery.easypiechart.js')}}"></script>
        <script src="{{asset('assets/vendor/flot/jquery.flot.js')}}"></script>
        <script src="{{asset('assets/vendor/flot-tooltip/jquery.flot.tooltip.js')}}"></script>
        <script src="{{asset('assets/vendor/flot/jquery.flot.pie.js')}}"></script>
        <script src="{{asset('assets/vendor/flot/jquery.flot.categories.js')}}"></script>
        <script src="{{asset('assets/vendor/flot/jquery.flot.resize.js')}}"></script>
        <script src="{{asset('assets/vendor/jquery-sparkline/jquery.sparkline.js')}}"></script>
        <script src="{{asset('assets/vendor/raphael/raphael.js')}}"></script>
        <script src="{{asset('assets/vendor/morris/morris.js')}}"></script>
        <script src="{{asset('assets/vendor/gauge/gauge.js')}}"></script>
        <script src="{{asset('assets/vendor/snap-svg/snap.svg.js')}}"></script>
        <script src="{{asset('assets/vendor/liquid-meter/liquid.meter.js')}}"></script>
        {{-- <script src="{{asset('assets/vendor/toaster/build/toastr.min.js')}}"></script> --}}
        <script src="{{asset('assets/vendor/modernizr/modernizr.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js
        "></script>
        @yield('js')
        
        <!-- Theme Base, Components and Settings -->
        <script src="{{asset('assets/javascripts/theme.js')}}"></script>
        
        <!-- Theme Custom -->
        <script src="{{asset('assets/javascripts/theme.custom.js')}}"></script>
        
        <!-- Theme Initialization Files -->
        <script src="{{asset('assets/javascripts/theme.init.js')}}"></script>


        <script type="text/javascript">
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "700",
                    "hideDuration": "1000",
                    "timeOut": "3000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }

                // toastr["success"]("message textbox", "message");
                @if (session()->has('toast')) {
                    toastr.{{session('toast.status')}}(
                    '{{session('toast.body')}}', '{{session('toast.topic')}}');                    
                }
                @endif
        </script>
    </body>
</html>