<!DOCTYPE html>
<html lang="en-US" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JKR | epHJKR</title>
    {{-- <link rel="apple-touch-icon" sizes="180x180" href="/img/risda_logo.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/risda_logo.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/risda_logo.png">
    <link rel="shortcut icon" type="image/x-icon" href="/img/risda_logo.png"> --}}
    <link rel="manifest" href="/assets/img/favicons/manifest.json">
    <meta name="theme-color" content="#ffffff">
    <script src="/assets/js/config.js"></script>
    <script src="/vendors/overlayscrollbars/OverlayScrollbars.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript" src="/assets/js/datatables.min.js"></script>
    <script type="text/javascript" src="/assets/js/datatables.js"></script>
    <script src="/assets/js/flatpickr.js"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script src="/vendors/choices/choices.min.js"></script>
    <link href="/vendors/choices/choices.min.css" rel="stylesheet" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css"
        rel="stylesheet">

    <link href="/vendors/leaflet/leaflet.css" rel="stylesheet">
    <link href="/vendors/leaflet.markercluster/MarkerCluster.css" rel="stylesheet">
    <link href="/vendors/leaflet.markercluster/MarkerCluster.Default.css" rel="stylesheet">
    <link href="/vendors/fullcalendar/main.min.css" rel="stylesheet">
    <link href="/vendors/flatpickr/flatpickr.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="/vendors/overlayscrollbars/OverlayScrollbars.min.css" rel="stylesheet">
    <link href="/assets/css/theme-rtl.min.css" rel="stylesheet" id="style-rtl">
    <link href="/assets/css/theme.min.css" rel="stylesheet" id="style-default">
    <link href="/assets/css/user-rtl.min.css" rel="stylesheet" id="user-style-rtl">
    <link href="/assets/css/user.min.css" rel="stylesheet" id="user-style-default">
    <link rel="stylesheet" type="text/css" href="/assets/css/datatables.css" />
    <link rel="stylesheet" type="text/css" href="/assets/css/datatables.min.css" />


    <script>
        var APP_URL = {!! json_encode(url('/')) !!}

        var isRTL = JSON.parse(localStorage.getItem('isRTL'));
        if (isRTL) {
            var linkDefault = document.getElementById('style-default');
            var userLinkDefault = document.getElementById('user-style-default');
            linkDefault.setAttribute('disabled', true);
            userLinkDefault.setAttribute('disabled', true);
            document.querySelector('html').setAttribute('dir', 'rtl');
        } else {
            var linkRTL = document.getElementById('style-rtl');
            var userLinkRTL = document.getElementById('user-style-rtl');
            linkRTL.setAttribute('disabled', true);
            userLinkRTL.setAttribute('disabled', true);
        }
    </script>
</head>

<body>

    <style>
        .form-control {
            border-color: #F4A258;
            box-shadow: inset 2px 2px 5px 2px lightgrey;
        }

        .text-primary {
            color: #EB5500 !important;
        }

        .bg-primary {
            background-color: #EB5500 !important;
            color: white;
        }

        .bg-orange-jkr{
            background-color: #EB5500;
        }

        .text-green-jkr {
            color: #5B8E7D;
            font-weight: 700;
        }

        .text-dark-green-jkr {
            color: #0F5E31;
        }

        .btn-green-jkr {
            color: white;
            background-color: #5B8E7D;
        }

        .btn-green-jkr:hover {
            color: white;
            background-color: #335349;
        }

        .btn-outline-green-jkr {
            color: #5B8E7D;
            background-color: white;
            border-color: #5B8E7D;
        }

        .btn-outline-green-jkr:hover {
            color: white;
            background-color: #335349;
        }

        .btn-orange-jkr {
            color: white;
            background-color: #EB5500;
        }

        .btn-orange-jkr:hover {
            color: white;
            background-color: #be4803;
        }

        .btn-outline-orange-jkr {
            color: #EB5500;
            background-color: white;
            border-color: #EB5500;
        }

        .btn-outline-orange-jkr:hover {
            color: white;
            background-color: #be4803;
        }

        .bg-orange-jkr{
            background-color: #EB5500;
        }

        .line-table{
            border-color: #F4A258;
        }

        .line-horizontal-jkr {
            border: 1px solid #EB5500;
        }

        .br-10 {
            border-radius: 10px;
        }

        .preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99999;
            display: flex;
            flex-flow: row nowrap;
            justify-content: center;
            align-items: center;
            background: none repeat scroll 0 0 #ffffff75;
        }

        .word {
            position: absolute;
            margin-top: 120px;
            margin-left: 25px;
            font-weight: bold;
        }

        .spinner {
            border: 1px solid transparent;
            border-radius: 3px;
            position: relative;
        }

        .spinner:before {
            content: "";
            box-sizing: border-box;
            position: absolute;
            top: 50%;
            left: 50%;
            width: 45px;
            height: 45px;
            margin-top: -10px;
            margin-left: -10px;
            border-radius: 50%;
            border: 5px solid #009640;
            border-top-color: #ffffff00;
            animation: spinner 0.9s linear infinite;
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes spinner {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
    

    @include('sweetalert::alert')



    <style>
        /* .form-control {
            border-color: #009640;
        } */

        .jkr-footer {
            background-color: #5B8E7D;
        }

        .hr-jkr{
            border: 1px solid #EB5500;
        }
        .nav-link-risda.active {
            background-color: #8DB368;
            color: white;
        }

        .nav-link.active {
            background-color: #F5E284;
            border-radius: 2px;
            color: black;
        }

        .nav-link.active-main {
            background-color: #8DB368;
            border-radius: 5px;
            color: white;
        }

        .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #fff;
            background-color: #8DB368;
        }

        .nav-link {
            display: block;
            padding: 0.5rem 1rem;
            color: #009640;
            -webkit-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
            -o-transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
            transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out;
        }

        .nav-link:hover,
        .nav-link:focus {
            color: #fff;
            background-color: #8DB368;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-primary,
        .navbar-vertical .btn-purchase,
        .tox .tox-menu__footer .tox-button:last-child,
        .tox .tox-dialog__footer .tox-button:last-child {
            color: #fff;
            background-color: #F4A258;
            border-color: #F4A258;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }

        .btn-primary:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #fff;
            background-color: #F4A258;
            border-color: #F4A258;
        }

        .btn-check:focus+.btn-primary,
        .navbar-vertical .btn-check:focus+.btn-purchase,
        .tox .tox-menu__footer .btn-check:focus+.tox-button:last-child,
        .tox .tox-dialog__footer .btn-check:focus+.tox-button:last-child,
        .btn-primary:focus,
        .navbar-vertical .btn-purchase:focus,
        .tox .tox-menu__footer .tox-button:focus:last-child,
        .tox .tox-dialog__footer .tox-button:focus:last-child {
            color: #fff;
            background-color: #8DB368;
            border-color: #8DB368;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%), 0 0 0 0 rgb(76 143 233 / 50%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%), 0 0 0 0 rgb(76 143 233 / 50%);
        }

        .btn-secondary {
            color: #F4A258;
            background-color: #fff;
            border-color: #F4A258;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-perutusan-jkr {
            color: #F4A258;
            background-color: #8C271E;
            border-color: #8C271E;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-perutusan-jkr:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #fff;
            background-color: #8C271E;
            border-color: #8C271E;
        }
        .btn-sejarah-jkr {
            color: #5B8E7D;
            background-color: #fff;
            border-color: #fff;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-sejarah-jkr:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #5B8E7D;
            background-color: #fff;
            border-color: #fff;
        }
        .btn-visi-jkr {
            color: #F5E284;
            background-color: #8C271E;
            border-color: #8C271E;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-visi-jkr:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #fff;
            background-color: #8C271E;
            border-color: #8C271E;
        }
        .btn-logo-jkr {
            color: #8DB368;
            background-color: #fff;
            border-color: #fff;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-logo-jkr:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #5B8E7D;
            background-color: #fff;
            border-color: #fff;
        }
        .btn-kuning-jkr {
            color: #F5E284;
            background-color: #8C271E;
            border-color: #8C271E;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-kuning-jkr:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #8C271E;
            background-color: #F5E284;
            border-color: #8C271E;
        }
        .btn-hijau-jkr {
            color: #04A777;
            background-color: #fff;
            border-color: #fff;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-hijau-jkr:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #fff;
            background-color: #04A777;
            border-color: #fff;
        }
        .btn-cawangan-jkr {
            color: #04DC9C;
            background-color: #fff;
            border-color: #fff;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }
        .btn-cawangan-jkr:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #fff;
            background-color: #04DC9C;
            border-color: #fff;
        }
        

        .btn-primary-sah {

            color: #fff;
            background-color: #F4A258;
            border-color: #F4A258;

            box-shadow: 0px 4px 4px rgba(244, 162, 88, 0.3);
            border-radius: 7px;
        }

        .btn-secondary:hover,
        .navbar-vertical .btn-purchase:hover,
        .tox .tox-menu__footer .tox-button:hover:last-child,
        .tox .tox-dialog__footer .tox-button:hover:last-child {
            color: #F4A258;
            background-color: #fff;
            border-color: #F4A258;
        }

        .btn-outline-primary {
            color: #F4A258;
            border-color: #F4A258;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #F4A258;
            border-color: #F4A258;
        }

        .line-table {
            border-color: #F4A258;
        }

        .line-corner-table-jkr{
            border-radius: 7.86741px;
        }

        .btn-sasaran-jkr {
            margin-right: 50px;
        }

        .btn-sah-jkr {
            margin-right: 20px;
        } 

        .btn-white-sah {
            border-color: #F4A258;
            background-color: #fff;
            color: #F4A258;
            -webkit-box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
            box-shadow: inset 0 1px 0 rgb(255 255 255 / 15%), 0 1px 1px rgb(0 0 0 / 8%);
        }

    

        .nav-link-side {
            /* display: block; */
            padding: 0.5rem 1rem;
            color: #fff;
            -webkit-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
            -o-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .nav-link-side {
                -webkit-transition: none;
                -o-transition: none;
                transition: none;
            }
        }

        .nav-link-side:hover,
        .nav-link-side:focus {
            color: #fff;
            background-color: #8DB368;
            text-decoration: none;
            border-radius: 5px;
        }

        .nav-link-side.disabled {
            color: #748194;
            pointer-events: none;
            cursor: default;
        }

        li {
            display: list-item;
            color: #009640;
            text-align: -webkit-match-parent;
        }

        .page-item.active .page-link {
            z-index: 3;
            color: var(--falcon-pagination-active-color);
            background-color: #009640;
            border-color: #009640;
        }

        .dropdown-indicator:after {
            content: "";
            display: block;
            position: absolute;
            right: 5 px;
            height: 0.4 rem;
            width: 0.4 rem;
            border-right: 1 px solid white;
            border-bottom: 1 px solid white;
            top: 50%;
            -webkit-transform: translateY(-50%) rotate(45deg);
            -ms-transform: translateY(-50%) rotate(45deg);
            transform: translateY(-50%) rotate(45deg);
            -webkit-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
            -webkit-transform-origin: center;
            -ms-transform-origin: center;
            transform-origin: center;
            -webkit-transition-property: border-color, -webkit-transform;
            transition-property: border-color, -webkit-transform;
            -o-transition-property: transform, border-color;
            transition-property: transform, border-color;
            transition-property: transform, border-color, -webkit-transform;
        }

        @media (min-width: 601px) {
            .navbar-vertical.navbar-expand-xl {
                max-width: 350px;
                top: 0;
                height: 100%;
                margin: 0;
            }

            .navbar-vertical.navbar-expand-xl .navbar-collapse {
                margin-top: 50px;
                width: 100%;
                /* height: 100%; */
                background: #0F5E31;
            }

            .navbar-vertical.navbar-expand-xl .navbar-vertical-content {
                width: 100%;
                height: 100%;
                padding: 0.5rem 0 0 0;
            }

            .navbar-vertical {
                position: absolute;
                background: #0F5E31;
                max-width: 350px;
            }

            .navbar-vertical-content {
                background: #0F5E31;
                width: 350px;
            }

            .navbar-nav {
                background: #0F5E31;
                width: 350px;
            }

            .risda-m {
                margin-left: 350px;
            }

            .navbar-vertical .navbar-collapse .navbar-vertical-content {
                padding: 0 1rem;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                max-height: 100%;
            }
        }

        @media only screen and (max-width: 1024px) {
            .risda-m {
                margin-left: 0px;
            }

            .navbar-vertical {
                position: absolute;
                background: #009640;
                max-width: 100%;
            }

            .navbar-vertical.navbar-expand-xl {
                max-width: 100%;
                top: 40px;
                height: auto;
                margin: 0;

            }

            .navbar-vertical.navbar-expand-xl .navbar-collapse {
                width: 100%;
                height: auto;
                background: #0F5E31;
            }

            .navbar-vertical.navbar-expand-xl .navbar-vertical-content {
                width: 100%;
                height: auto;
                padding: 0.5rem 0 0 0;
            }

            .navbar-vertical {
                position: absolute;
                background: #009640;
                max-width: 100%;
            }

            .navbar-vertical-content {
                background: #0F5E31;
                width: 100%;
            }
        }

        .form-check-input:checked {
            background-color: #009640;
            border-color: #009640;
        }

        .flatpickr-day.selected {
            background-color: #009640;
            border-color: #009640;
        }

        .choices .choices__list--dropdown .choices__item--selectable.is-highlighted {
            background-color: #009640;
            color: var(--falcon-choices-item-selectable-highlighted-bg);
        }

        .jkr-header {
            /* font-family: 'Montserrat'; */
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 22px;
            /* identical to box height */
            text-align: center;

            /* ORANGE */
            color: #F4A258;
        }

        .jkr-header-title{
            font-style: normal;
            font-weight: 700;
            font-size: 25px;
            line-height: 30px;
            display: flex;
            align-items: center;

            /* Red orange */

            color: #EB5500;
        }

        .btn-final {
            color: #797979;
            background-color: transparent;
            border-color: transparent;
        }

        .btn-final:hover {
            color: white !important;
            background-color: #EB5500;
            border-color: #EB5500;
        }

        .row-odd {
            background-color: #F4A258;
        }

        .row-even {
            background-color: #F4A258;
        }

        .star {
            color:#FF0000;
        }

        .shadow-table-jkr{
            background: #FFFFFF;
            box-shadow: 0px 2.86088px 7.15219px 7.15219px rgba(0, 0, 0, 0.05);
            border-radius: 7.15219px;
        }

    </style>
    
    <?php
        use Illuminate\Support\Facades\Auth;
    ?>
    {{-- <div  style="background:url(/assets/img/Rectangle.png)no-repeat center; height:400px; position: fixed;"><div> --}}
    <img src="/assets/img/Rectangle.png" alt="" class="" style="position: absolute; z-index: -99999;" height="500px" width="100%" >

    <main class="main" id="top">
            <nav class="navbar navbar-expand p-3"
                style="box-shadow: 0px 2px 2px 1px rgba(0,0,0,0); background-color: rgba(0,0,0,0); z-index: 2;">
                <div class="col-3 text-center" style="filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));">
                    <img src="/assets/img/JATA_NEGARA_MALAYSIA.png" alt="Jata Negara"
                        style="width: 82.45px; height: 64.3px;">
                    <img src="/assets/img/JKR_LOGO.png" alt="JKR" style="width: 81.46px; height: 54.93px;">
                    <img src="/assets/img/EPHJKR_LOGO.png" alt="EPHJKR" style="width: 95.73px; height: 87.31px;">
                </div>
                
                <div class="col-1 text-end">
                    <a href="/" class="jkr-header">UTAMA</a>
                </div>
                {{-- <div class="col-2 text-end">
                    <a href="/about" class="jkr-header">MENGENAI KAMI</a>
                </div> --}}
                <div class="col-2 text-end">
                    <a href="/about" class="jkr-header">MENGENAI KAMI</a>
                </div>
                <div class="col-2 text-end">
                    <a href="/contact" class="jkr-header">HUBUNGI KAMI</a>
                </div>
                <div class="col-2 text-end">
                    <a href="/faq" class="jkr-header">SOALAN LAZIM</a>
                </div>
                <div class="col-2 text-end">
                    <a href="{{ route('login') }}" class="btn jkr-header" style="border-color: #F4A258;">LOG MASUK</a>
                </div>
            </nav>

            <div class="col-12" style="z-index: 2;">
                <h3 class="mt-4 text-center text-white" >e-Penarafan Hijau Jabatan Kerja Raya</h3>
                <br>
                 <h4 class= "text-center text-white">(e-pHJKR)</h4>

            {{-- <div class="col-1 text-end">
                <a href="/" class="jkr-header">UTAMA</a>
            </div>
            <div class="col-2 text-end">
                <a href="/hebahan" class="jkr-header">MENGENAI KAMI</a>
            </div>
            <div class="col-2 text-end">
                <a href="/contact" class="jkr-header">HUBUNGI KAMI</a>
            </div>
            <div class="col-2 text-end">
                <a href="/faq" class="jkr-header">SOALAN LAZIM</a>
            </div>
            <div class="col-2 text-end">
                <a href="/login" class="btn jkr-header" style="border-color: #F4A258;">LOG MASUK</a>

            </div> --}}
            

        
        
        <div class="container-fluid ps-0" data-layout="container" style="margin-top: 10%">

            <div class="row">

                <div class="content" style="background: white">
                    
                        <div class="container">
                            @yield('content')
                        </div>


                </div>
            </div>
        </div>



        <footer class="jkr-footer">
            <div class="row p-3 align-items-center">
                <div class="col-10">
                    <div class="text-white" style="font-size: 10px;">
                        Hakcipta Terpelihara © 2022 Kementerian Kerja Raya Malaysia Paparan Terbaik Menggunakan Internet
                        Explorer 7.0 Atau Mozilla Firefox Dengan Resolusi Skrin 1280x800
                    </div>
                </div>
                <div class="col-2 text-end text-white">
                    <a href="/privasi" class="text-white" style="font-size: 10px;">Dasar Privasi</a> | <a
                        href="/keselamatan" class="text-white" style="font-size: 10px;">Dasar Keselamatan</a>
                </div>
            </div>
        </footer>

    </main>


    <script>
        $(document).ready(function() {
            $('#preload2').hide();
        });

        $('.up-switch-risda').click(function() {
            $('#preload2').show();
        });

        $(document).load(function() {
            $('#preload2').show();
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script src="/vendors/popper/popper.min.js"></script>
    <script src="/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="/vendors/anchorjs/anchor.min.js"></script>
    <script src="/vendors/is/is.min.js"></script>
    <script src="/vendors/chart/chart.min.js"></script>
    <script src="/vendors/leaflet/leaflet.js"></script>
    <script src="/vendors/leaflet.markercluster/leaflet.markercluster.js"></script>
    <script src="/vendors/leaflet.tilelayer.colorfilter/leaflet-tilelayer-colorfilter.min.js"></script>
    <script src="/vendors/countup/countUp.umd.js"></script>
    <script src="/vendors/echarts/echarts.min.js"></script>
    <script src="/vendors/progressbar/progressbar.min.js"></script>
    <script src="/vendors/fullcalendar/main.min.js"></script>
    <script src="/assets/js/flatpickr.js"></script>
    <script src="/vendors/dayjs/dayjs.min.js"></script>
    <script src="/vendors/fontawesome/all.min.js"></script>
    <script src="/vendors/lodash/lodash.min.js"></script>
    <script src="/vendors/list.js/list.min.js"></script>
    <script src="/assets/js/theme.js"></script>

    <script src="/js/sweetalert2.all.min.js"></script>

    <script>
        $(document).ready(function() {
            setInterval(() => {
                const today = new Date();
                let day = today.getDate();
                const bulan = ['Januari', 'Februari', 'Mac', 'April', 'May', 'Jun', 'Julai', 'Ogos',
                    'September', 'Oktober', 'November', 'Disember'
                ];
                let month = bulan[today.getMonth()];
                let year = today.getFullYear();
                let h = today.getHours();
                let m = today.getMinutes();
                let s = today.getSeconds();
                if (m < 10) m = "0" + m;
                if (s < 10) s = "0" + s;
                if (day < 10) day = "0" + day;
                document.getElementById("time").innerHTML = h + ":" + m + ":" + s;
                document.getElementById("date").innerHTML =
                    day + " " + month + " " + year;
            }, 1000);



            $('.datatable').DataTable();




            $(".tahun").datepicker({
                format: "yyyy",
                viewMode: "years",
                minViewMode: "years",
                autoclose: true
            });

        });
    </script>
</body>



</html>