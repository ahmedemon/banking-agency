<!DOCTYPE html>
<html>

<head>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Blue Star Shomithi' }} | ব্লু স্টার সঞ্চয় ও ঋণ দান সমবায় সমিতি</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Somitykeeper" name="author">
    <meta content="CoinCrow is a microcredit system" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="{{ asset('images/logo.png') }}" rel="shortcut icon">
    <link href="{{ asset('images/logo.png') }}" rel="apple-touch-icon">
    <link href="{{ asset('images/logo.png') }}" rel="shortcut icon">
    <link href="{{ asset('images/logo.png') }}" rel="apple-touch-icon">
    {{-- <link href="{{asset('css/fastFont.css')}}" rel="stylesheet"> --}}

    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fullcalendar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/perfect-scrollbar.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('css/maince5a.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css')  }}" rel="stylesheet">
    @stack('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

<style>

        .toast-top-right {
            margin-top: 50px;
        }

        .label {
            color: black;
        }

        @font-face {
            font-family: 'Kalpurush';
            url('/fox/css/fonts/Kalpurush.woff') format('woff'),
            /* Modern Browsers */
            url('/fox/css/fonts/Kalpurush.ttf') format('truetype'),
            /* Safari, Android, iOS */
            /*url('webfont.svg#svgFontName') format('svg'); */
            /* Legacy iOS */
        }

        /* Hide HTML5 Up and Down arrows. */
        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
        }

        .required:after {
            content: " *";
            color: red;
        }

    </style>
    <style>
        .label {
            font-size: 14px !important;
        }

        .pt-user-name {
            font-weight: bolder;
        }

        .AmountHead {
            width: 100%;
            height: 100%;
            padding: 5px;
            background: rgb(147, 6, 6);
            color: white !important;
            border-bottom: 2px solid black;
        }

        .TitleH {
            padding: 0 !important;
            margin: 0;
            border: 1px solid black;
        }

        .Amount {
            padding: 20px 0px;
            font-size: 40px !important;
            font-weight: bold !important;
            color: #1DCC70;
        }

        .marquee {
            color: black;
            border-top: 1px solid black;
        }

        .fa {
            font-size: 20px;
        }

        /* .Icon{
    background: black;
    margin: 0 !important;
    padding: 0 !important;
} */

    @media (max-width: 930px){
        a.el-tablo .label {
            -webkit-transition: none;
            transition: none;
            height: 90px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

    @media (min-width: 931px) and (max-width: 1300px){
         a.el-tablo .label {
            -webkit-transition: none;
            transition: none;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    }

    a.element-box.el-tablo:hover, a.element-box.el-tablo:active, a.element-box.el-tablo:focus {
        background: transparent !important;
        color: #1DCC70 !important;
    }

    </style>
    @stack('stylesheet')
</head>

<body class="menu-position-top full-screen">
    <div class="solid-bg-all">
        <div class="layout-w">
            {{-- content goes here --}}
            @include('layouts.frontend.topbar')
            @include('partials.message')
            @yield('content')
            {{-- content goes here --}}
        </div>
    </div>




    <script src="{{ asset('js/popper.min.js') }}"></script>

    @stack('javascripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>

    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <script src="{{asset('js/select2.full.min.js')}}"></script>
    <script src="{{asset('js/validator.min.js')}}"></script>
    <script src="{{asset('js/daterangepicker.js')}}"></script>
    <script src="{{asset('js/ion.rangeSlider.min.js')}}"></script>
    <script src="{{asset('js/dropzone.js')}}"></script>
    <script src="{{asset('js/mindmup-editabletable.js')}}"></script>

    <script src="{{asset('js/fullcalendar.min.js')}}"></script>
    <script src="{{asset('js/perfect-scrollbar.jquery.min.js')}}"></script>
    <script src="{{asset('js/tether.min.js')}}"></script>
    <script src="{{asset('js/slick.min.js')}}"></script>
    <script src="{{asset('js/util.js')}}"></script>
    <script src="{{asset('js/alert.js')}}"></script>
    <script src="{{asset('js/button.js')}}"></script>
    <script src="{{asset('js/carousel.js')}}"></script>
    <script src="{{asset('js/collapse.js')}}"></script>
    <script src="{{asset('js/dropdown.js')}}"></script>
    <script src="{{asset('js/modal.js')}}"></script>
    <script src="{{asset('js/tab.js')}}"></script>
    <script src="{{asset('js/tooltip.js')}}"></script>
    <script src="{{asset('js/popover.js')}}"></script>
    <script src="{{asset('js/demo_customizerce5a.js')}}"></script>
    <script src="{{asset('js/maince5a.js')}}"></script>
    <script src="{{asset('js/all.min.js')}}"></script>


    {{-- my js file --}}
    <script src="{{ asset('js/share.value.js') }}"></script>
    {{-- my js file --}}

    <script type="text/javascript">
        $("form").submit(function(event) {
            if ($(this).attr('note') !== '' && $(this).attr('note') !== 'undefined' && $(this).attr('note')) {
                if (!confirm($(this).attr('note'))) {
                    event.preventDefault();
                }
            }
        });
    </script>


    <script>
        jQuery(document).ready(function($) {
            // Disable scroll when focused on a number input.
            $('form').on('focus', 'input[type=number]', function(e) {
                $(this).on('wheel', function(e) {
                    e.preventDefault();
                });
            });
            // Restore scroll on number inputs.
            $('form').on('blur', 'input[type=number]', function(e) {
                $(this).off('wheel');
            });
            // Disable up and down keys.
            $('form').on('keydown', 'input[type=number]', function(e) {
                if (e.which == 38 || e.which == 40)
                    e.preventDefault();
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".toy").attr('readonly', true);
        });

        $("#allDate").click(function() {
            $(".toy").attr('readonly', true);
        });
        $("#dateRange").click(function() {
            $(".toy").attr('readonly', false);
        })


        // $("#allDate").click(function () {
        //     $("#start, #end, .start, .end").attr('disabled', true);
        // });
        // $("#dateRange").click(function () {
        //     $("#start, #end, .start, .end").attr('disabled', false);
        // });
    </script>

</body>

</html>
