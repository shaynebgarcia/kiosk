@extends('layouts.admindek-auth')

@section('content')
    <form class="login-form validate-form" method="POST" action="{{ route('login') }}">
        @CSRF
        <div class="text-center">
            {{-- <i class="feather icon-home text-white" style="font-size: xx-large;" ></i> --}}
            <!-- <h1 class="text-white" style="padding: 2rem 0;letter-spacing: 17px;">PMS</h1> -->
            <!-- <img src="{{ asset('img/dashboard.png') }}" alt="logo.png" style="padding: 4rem 1rem;" width="15%">
            <img src="{{ asset('img/pos.png') }}" alt="logo.png" style="padding: 4rem 1rem;" width="15%"> -->
        </div>
        <div class="auth-box card">
            <div class="card-block">
                <!-- <div class="row m-b-20">
                    <div class="col-md-12">
                        <h3 class="text-center txt-primary">Dashboard / POS</h3>
                    </div>
                </div> -->
                <div class="form-group form-primary">
                    <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" required autocomplete="username" placeholder="Username">
                </div>
                <div class="form-group form-primary">
                    <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password" placeholder="Password">
                </div>
                <div class="row m-t-30">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-theme btn-theme-round btn-md btn-block waves-effect text-center m-b-10">LOGIN</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="login-more" style="background-image: url({{ asset('img/18980.jpg') }});">
        <div class="row">
            <div class="col">
                <div class="bitverse-logo">
                    <img src="{{ asset('img/bitverse-logo-darkblue-blue.png') }}">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-plugin')
@endsection