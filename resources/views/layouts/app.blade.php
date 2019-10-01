<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script type="text/javascript" charset="utf8" src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="{{ asset('lib/DataTables-1.10.13/js/jquery.dataTables.min.js') }}"></script>

    <script type="text/javascript" charset="utf8" src="<?=asset('js/moment.js')?>"></script>
    <script type="text/javascript" charset="utf8" src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ asset('fonts/all.min.css') }}" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/menu.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('lib/DataTables-1.10.13/css/jquery.dataTables.min.css') }}">



</head>
<body>


@include('layouts.partials.header')

<div class="wrapper">
<!-- Page Content -->
    <div id="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>

    @include('layouts.partials.footer')
</div>

<script>
    $(document).ready(function () {

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });

    });
</script>




</body>
</html>
