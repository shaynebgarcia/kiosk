@extends('layouts.admindek', ['pageSlug' => 'dashboard'])

@section('css-plugin')
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/css/font-awesome-n.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('laravel-admindek/assets/css/widget.css') }}">
@endsection

@section('breadcrumbs')
    @php
        $breadcrumb_title = 'Dashboard';
        $breadcrumb_subtitle = 'Dashboard';
    @endphp
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@section('content')
    <div class="row ">
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-red">
            <div class="card-body">
            <div class="row align-items-center m-b-30">
            <div class="col">
            <h6 class="m-b-5 text-white">Total Profit</h6>
            <h3 class="m-b-0 f-w-700 text-white">$1,783</h3>
            </div>
            <div class="col-auto">
            <i class="fas fa-money-bill-alt text-c-red f-18"></i>
            </div>
            </div>
            <p class="m-b-0 text-white"><span class="label label-danger m-r-10">+11%</span>From Previous Month</p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-blue">
            <div class="card-body">
            <div class="row align-items-center m-b-30">
            <div class="col">
             <h6 class="m-b-5 text-white">Total Orders</h6>
            <h3 class="m-b-0 f-w-700 text-white">15,830</h3>
            </div>
            <div class="col-auto">
            <i class="fas fa-database text-c-blue f-18"></i>
            </div>
            </div>
            <p class="m-b-0 text-white"><span class="label label-primary m-r-10">+12%</span>From Previous Month</p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-green">
            <div class="card-body">
            <div class="row align-items-center m-b-30">
            <div class="col">
            <h6 class="m-b-5 text-white">Average Price</h6>
            <h3 class="m-b-0 f-w-700 text-white">$6,780</h3>
            </div>
            <div class="col-auto">
            <i class="fas fa-dollar-sign text-c-green f-18"></i>
            </div>
            </div>
            <p class="m-b-0 text-white"><span class="label label-success m-r-10">+52%</span>From Previous Month</p>
            </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card prod-p-card card-yellow">
            <div class="card-body">
            <div class="row align-items-center m-b-30">
            <div class="col">
            <h6 class="m-b-5 text-white">Product Sold</h6>
            <h3 class="m-b-0 f-w-700 text-white">6,784</h3>
            </div>
            <div class="col-auto">
            <i class="fas fa-tags text-c-yellow f-18"></i>
            </div>
            </div>
            <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+52%</span>From Previous Month</p>
            </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="alert alert-primary background-primary">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="icofont icofont-close-line-circled"></i>
                </button>
                <strong>Hi <span class="f-w-700">{{ Auth::user()->firstname }}</span>!</strong> You are currently managing <span class="text-uppercase f-w-700">COMPANY HERE</span>.
            </div>
        </div>
    </div>
@endsection

@section('js-plugin')
    <script type="text/javascript" src="{{ asset('laravel-admindek/assets/pages/dashboard/custom-dashboard.js') }}"></script>
@endsection