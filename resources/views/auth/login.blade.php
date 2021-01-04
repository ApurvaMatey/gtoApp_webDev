<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
        </script>
        
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <!-- Meta -->
        <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
        <meta name="author" content="BootstrapDash">

        <title>Azia Responsive Bootstrap 4 Dashboard Template</title>

        <!-- vendor css -->
        <link href="{{ asset('lib/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/typicons.font/typicons.css') }}" rel="stylesheet">

        <!-- azia CSS -->
        <link rel="stylesheet" href="{{ asset('css/azia.css') }}">

    </head>
    <body class="az-body">
        <div class="az-signin-wrapper">
            <div class="az-card-signin">
                <h1 class="az-logo">GTO</h1>
                <div class="az-signin-header">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label>Email</label>
                            <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div><!-- form-group -->
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        </div><!-- form-group -->
                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div><!-- az-signin-header -->
            </div><!-- az-card-signin -->
        </div><!-- az-signin-wrapper -->

        <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('lib/ionicons/ionicons.js') }}"></script>

        <script src="{{ asset('js/azia.js') }}"></script>
        <script>
        $(function(){
            'use strict'

        });
        </script>
        <!-- New Ends -->
    </body>
</html>