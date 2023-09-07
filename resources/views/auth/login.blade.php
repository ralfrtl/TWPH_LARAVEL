<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container m-5 mx-auto z-1">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card blurred-orange shadow-lg">
                <div class="card-body">
                    <p class="h2 m-5 text-center">{{ __('Employee portal login') }}</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-floating mx-auto mb-3 col-md-6">
                            <input type="email" class="form-control @error('mail') is-invalid @enderror"
                                   id="email" placeholder="name@example.com"
                                   name="email" value="{{ old('mail') }}" required autocomplete="email" autofocus>
                            <label for="email">Email address</label>
                        </div>

                        <div class="form-floating mx-auto mb-3 col-md-6">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password"
                                   required autocomplete="current-password">
                            <label for="password">Password</label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember"
                                           id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-5">
                                <button type="submit" class="btn mx-auto col-md-6 rounded-5 btn-primary">
                                    {{ __('Login') }}
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
