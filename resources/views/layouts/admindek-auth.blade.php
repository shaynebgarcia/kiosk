<!DOCTYPE html>
<html lang="en">
    <head>
        <title>{{ config('custom.app.name') }} - {{ config('custom.company.name') }}</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="icon" href="{{ asset('img/icon.svg') }}" type="image/x-icon">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"><link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/bower_components/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/icon/feather/css/feather.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/css/style.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/css/pages.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/pos.css') }}">
    </head>

    <body style="background:none!important;">
        @include('errors.portrait')
        <div id="pageTrap" class="limiter">
            <div class="container-login">
                <div class="wrap-login">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('layouts.js')
        @yield('js-plugin')
    </body>

</html>
