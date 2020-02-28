
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        <title>Login</title>
        <meta name="description" content="Startup HTML template OptimizedHTML 5">
        <link rel="icon" href="img/favicon.png">
        <meta property="og:image" content="/z/img/@1x/preview.jpg">
        <link rel="stylesheet" href="/z/css/styles.min.css">
    </head>
    <body>
        <header class="header">
            <div class="container container-mobile">
                <div class="logo">
                    <div class="logo__icon"></div>
                    <div class="logo__text"></div>
                </div>
            </div>
        </header>
        <div class="container container_m-white">
            <div class="auth-panel">
                <div class="logo-auth">
                    <div class="logo-auth__logo"></div>
                    <h1 class="logo-auth__title">Rating social network</h1>
                    <h2 class="logo-auth__text">Upload your skills, earn and rate.</h2>
                </div>
                <form class="form form-auth" method="POST" action="{{ route('login') }}">
                    @csrf
                    <input class="form-auth__input" type="email" placeholder="Email" value="{{ old('email') }}" name="email">
                    @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                    @endif
                    <input class="form-auth__input" type="password" placeholder="Password" name="password">
                    @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    <a class="auth-panel__span auth-panel__span_m type-h4" href="{{ route('password.request') }}">Forgot password?</a>
                    <button class="btn btn_accent btn_full btn_h2" type="submit">Login</button>
                </form>
                <div class="auth-share">
                    <a class="btn-share btn-share_facebook" href="{{ route('social.redirect',['provider' => 'facebook']) }}"></a>
                    <a class="btn-share btn-share_google" href="{{ route('social.redirect',['provider' => 'google']) }}"></a>
                </div>
                <div class="auth-create"><span class="auth-panel__span">Don't have an account?</span>
                    <div class="auth-create__link-center"><a class="auth-create__link type-h2 type-h3_m" href="#">Create</a></div>
                </div>
            </div>
        </div>
        <script src="/z/js/scripts.min.js"></script>
    </body>
</html>

<?php return ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            </div>
                        </div>

                        <p class="text-center mb-3">
                            Or Login with
                        </p>

                        @include('partials.socials-icons')

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
