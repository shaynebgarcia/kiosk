<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('custom.app.name') }} - {{ config('custom.company.name') }}</title>
    <link rel="shortcut icon" href="{{ asset('img/icon.svg') }}">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!-- CSS STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/icon/feather/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/css/style.css') }}">
      <!-- CSS CUSTOM STYLESHEETS -->
      <link rel="stylesheet" type="text/css" href="{{ asset('css/pos.css') }}">
      <!-- CSS PLUGIN SCRIPTS -->
      @yield('css-plugin')
  </head>

  <body class="pos">
    @include('errors.portrait')
    @include('errors.mobile')
    <!-- PRELOADER -->
    <div class="loader-bg-inner" id="loadingDiv">
      <div class="loader-bar-inner"></div>
    </div>
    <!-- LAYOUT -->
    <div class="pos" id="app">
      <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
          <div class="pcoded-container navbar-wrapper">
            <!-- MAIN TOP HEADER -->
              @include('layouts.includes.header')
                <!-- CONTENT -->
                @yield('content')
          </div>
      </div>
    </div>
    <!-- JS SCRIPTS -->
      @include('layouts.js-horizontal')
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <!-- JS PLUGIN SCRIPTS -->
      @yield('js-plugin')
  </body>
</html>