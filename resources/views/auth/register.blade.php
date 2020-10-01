{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}





<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Twitter -->
    <meta name="twitter:site" content="@themepixels">
    <meta name="twitter:creator" content="@themepixels">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Bracket Plus">
    <meta name="twitter:description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="twitter:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">

    <!-- Facebook -->
    <meta property="og:url" content="http://themepixels.me/bracketplus">
    <meta property="og:title" content="Bracket Plus">
    <meta property="og:description" content="Premium Quality and Responsive UI for Dashboard.">

    <meta property="og:image" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:secure_url" content="http://themepixels.me/bracketplus/img/bracketplus-social.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="600">

    <!-- Meta -->
    <meta name="description" content="Premium Quality and Responsive UI for Dashboard.">
    <meta name="author" content="ThemePixels">

    <title>Register</title>

    <!-- vendor css -->
    <link href="/bracket-master/app/lib/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="/bracket-master/app/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="/bracket-master/app/lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="/bracket-master/app/css/bracket.css">

    {{-- favicon --}}
    <link rel="shortcut icon" href="/bracket-master/app/img/favicon-register.ico" type="image/x-icon">

</head>

<body>

<div class="row no-gutters flex-row-reverse ht-100v">
    <div class="col-md-6 bg-gray-200 d-flex align-items-center justify-content-center">
    <div class="login-wrapper wd-250 wd-xl-350 mg-y-30">
        <h4 class="tx-inverse tx-center" style="font-weight:bold;">Hello! let's register your account</h4>
        <p class="tx-center mg-b-60">Signing up is easy. It only takes a few steps.</p>

        <form action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter your name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter your email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                
                <div class="form-group">
                    <div class="input-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  autocomplete="new-password" placeholder="Password Baru">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye1" onclick="toggle1()"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="input-group">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password" placeholder="Confirm Password Baru">
                        <div class="input-group-append">
                            <div class="input-group-text"><i class="fa fa-eye" arial-hidden="true" id="eye2" onclick="toggle2()"></i></div>
                        </div>
                    </div>
                </div>

                <div class="form-group tx-12">By clicking on the register button below, you agree to our privacy policy and terms of use for our website.</div>
                <button type="submit" class="btn btn-block btn-primary font-weight-medium auth-form-btn">
                    {{ __('Register') }}
                </button>
            

            <div class="mg-t-60 tx-center">Already a member? <a href="{{route('login')}}" class="tx-info">Login</a></div>
        </form>
    </div><!-- login-wrapper -->


    </div><!-- col -->
    <div class="col-md-6 bg-br-primary d-flex align-items-center justify-content-center">
        <div class="wd-250 wd-xl-450 mg-y-30">
            <div class="signin-logo tx-28 tx-bold tx-white"><span class="tx-normal">[</span> Elektronik <span class="tx-info">Raport</span> <span class="tx-normal">]</span></div>
            <div class="tx-white mg-b-60">Aplikasi Management Raport Online SMKN 4 Kota Bekasi.</div>

            <h5 class="tx-white">Apa Itu </span> Elektronik <span class="tx-info">Raport</span> <span class="tx-normal">?</h5>
            <p class="tx-white-6">E-Raport adalah sebuah sistem aplikasi berbasis Web yang di harapkan dapat merubah pola kerja guru dari pola manual ke pola digital dan juga dapat mempermudah guru dalam melakukan penilaian ke siswa bahkan sampai ke cetak rapor dan evaluasi nilai hasil belajar siswa.</p>
        </div><!-- wd-500 -->
    </div>
</div><!-- row -->

<script src="/bracket-master/app/lib/jquery/jquery.min.js"></script>
<script src="/bracket-master/app/lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="/bracket-master/app/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/bracket-master/app/lib/select2/js/select2.min.js"></script>
<script>
    $(function(){
    'use strict';

    $('.select2').select2({
        minimumResultsForSearch: Infinity
    });
    });
</script>


<script>
    var state= false;
    function toggle1() {
        if (state) {
            document.getElementById(
                "password").
                setAttribute("type", "password");
            document.getElementById(
                "eye1").style.color='#7a797e';
            state = false;
        }else{
            document.getElementById(
                "password").
                setAttribute("type", "text");
            document.getElementById(
                "eye1").style.color='#5887ef';
            state = true;
        }
    }

    function toggle2() {
        if (state) {
            document.getElementById(
                "password-confirm").
                setAttribute("type", "password");
            document.getElementById(
                "eye2").style.color='#7a797e';
            state = false;
        }else{
            document.getElementById(
                "password-confirm").
                setAttribute("type", "text");
            document.getElementById(
                "eye2").style.color='#5887ef';
            state = true;
        }
    }
</script>


</body>
</html>

