<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('admin/css/perfect-scrollbar.min.css') }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('admin/font-awesome-4/css/font-awesome.min.css') }}">
    <style>
        html:not([dir=rtl]) .dropdown-toggle::after {
            display: none;
        }
        .btn-list {
            min-width: 160px;
        }
        .btn-icon {
            margin-bottom: auto!important;
            margin-right: 0.25rem!important;
        }
    </style>
    @stack('css')
</head>
<body class="c-app">
@include('dashboard.layouts.partials.sidebar')
<div class="c-wrapper c-fixed-components">

    @include('dashboard.layouts.partials.header')

    <div class="c-body">
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">
                    @include('dashboard.layouts.partials.alerts')
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</div>
<!-- Optional JavaScript -->
<!-- Popper.js first, then CoreUI JS -->
<script src="{{ asset('admin/js/coreui.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/svgxuse.min.js') }}"></script>
<script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>
@stack('scripts')
</body>
</html>
