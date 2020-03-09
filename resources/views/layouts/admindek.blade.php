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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">
    <!-- CSS STYLESHEETS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/bower_components/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/pages/waves/css/waves.min.css') }}" media="all">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/pages/prism/prism.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/icon/feather/css/feather.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/icon/themify-icons/themify-icons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/icon/icofont/css/icofont.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/icon/font-awesome/css/font-awesome.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/css/pages.css') }}">
      <!-- CSS PLUGIN SCRIPTS -->
      @yield('css-plugin')
  </head>

  <body class="hold-transition">
    <!-- PRELOADER -->
    <div class="loader-bg">
      <div class="loader-bar"></div>
    </div>
    <!-- LAYOUT -->
    <div id="pcoded" class="pcoded">
      <div class="pcoded-overlay-box"></div>
      <div class="pcoded-container navbar-wrapper">
        <!-- MAIN TOP HEADER -->
        @include('layouts.includes.header')
        <div class="pcoded-main-container">
          <div class="pcoded-wrapper">
            <!-- MAIN SIDE BAR -->
            @include('layouts.includes.sidebar')
            <div class="pcoded-content">
              @include('layouts.includes.breadcrumb')
              <div class="pcoded-inner-content">
                <div class="main-body">
                  <div class="page-wrapper">
                    <div class="page-body">
                      <!-- CONTENT -->
                      @yield('content')
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- JS SCRIPTS -->
    @include('layouts.js')
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <!-- JS PLUGIN SCRIPTS -->
      @yield('modals')
      @yield('js-plugin')
  </body>
</html>